<?php
require_once 'init.php';
if(isset($_POST['add_category']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('category')->addCategory($_POST);
        
        switch($result)
        {
            case ADD_ERROR:
                Session::setSession(ADD_ERROR,"Add Category Error");
                Util::redirect("manage-category.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS,"Add Category Success!");
                Util::redirect("manage-category.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);// Aray hy toh directly bhej sakte
                Session::setSession('errors',serialize($di->get('category')->getValidator()->errors()));//obj hy isiliye serialize kar k bheja
                Util::redirect("add-category.php");
                break;
        }
    }
    else{
        Session::setSession("csrf","CSRF Error");
        Util::redirect("manage-category.php");//Need to change this, actually we will be redirecting to some error page indicating Unauthorized access
        
    }
}

if(isset($_POST['add_customer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('customer')->addCustomer($_POST);
        
        switch($result)
        {
            case ADD_ERROR:
                Session::setSession(ADD_ERROR,"Add Customer Error");
                Util::redirect("manage-customer.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS,"Add Customer Success!");
                Util::redirect("manage-customer.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);// Aray hy toh directly bhej sakte
                Session::setSession('errors',serialize($di->get('customer')->getValidator()->errors()));//obj hy isiliye serialize kar k bheja
                Util::redirect("add-customer.php");
                break;
        }
    }
    else{
        Session::setSession("csrf","CSRF Error");
        Util::redirect("manage-customer.php");//Need to change this, actually we will be redirecting to some error page indicating Unauthorized access
        
    }
}

if(isset($_POST['add_supplier']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('supplier')->addSupplier($_POST);
        
        switch($result)
        {
            case ADD_ERROR:
                Session::setSession(ADD_ERROR,"Add Supplier Error");
                Util::redirect("manage-supplier.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS,"Add Supplier Success!");
                Util::redirect("manage-supplier.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);// Aray hy toh directly bhej sakte
                Session::setSession('errors',serialize($di->get('supplier')->getValidator()->errors()));//obj hy isiliye serialize kar k bheja
                Util::redirect("add-supplier.php");
                break;
        }
    }
    else{
        Session::setSession("csrf","CSRF Error");
        Util::redirect("manage-supplier.php");//Need to change this, actually we will be redirecting to some error page indicating Unauthorized access
        
    }
}



if(isset($_POST['add_product']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('product')->addProduct($_POST);
        
        switch($result)
        {
            case ADD_ERROR:
                Session::setSession(ADD_ERROR,"Add Product Error");
                Util::redirect("manage-product.php");
                break;
            case ADD_SUCCESS:
                Session::setSession(ADD_SUCCESS,"Add Product Success!");
                Util::redirect("manage-product.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);// Aray hy toh directly bhej sakte
                Session::setSession('errors',serialize($di->get('product')->getValidator()->errors()));//obj hy isiliye serialize kar k bheja
                Util::redirect("add-product.php");
                break;
        }
    }
    else{
        Session::setSession("csrf","CSRF Error");
        Util::redirect("manage-product.php");//Need to change this, actually we will be redirecting to some error page indicating Unauthorized access
        
    }
}


if(isset($_POST['page']))
{
    if($_POST['page'] == 'manage_category')
    {
        $dependency = 'category';
    }
    elseif($_POST['page'] == 'manage_customer'){
        
        $dependency = 'customer';
    }
    elseif($_POST['page'] == 'manage_supplier'){
        
        $dependency = 'supplier';
    }
    elseif($_POST['page'] == 'manage_product'){
        
        $dependency = 'product';
    }
    //&_POST['search']['value']
    //&_POST['start']
    //&_POST['length']
    //&_POST['order']
    //&_POST['draw']
    // Util::dd($dependency);
    $search_parameter = $_POST['search']['value'] ?? null;
    $order_by = $_POST['order'] ?? null;
    $start = $_POST['start'];
    $length = $_POST['length'];
    $draw = $_POST['draw'];
    
    $di->get($dependency)->getJSONDataForDataTable($draw,$search_parameter,$order_by,$start,$length);
    
}
if(isset($_POST['fetch']))
{
    //Util::dd($_POST['fetch']);
    if($_POST['fetch'] == 'category')
    {
        $category_id = $_POST['category_id'];
        $result = $di->get('category')->getCategoryByID($category_id,PDO::FETCH_ASSOC);
        //Util::dd($result[0]);
        echo json_encode($result[0]);
    }
    if($_POST['fetch'] == 'supplier')
    {
        $supplier_id = $_POST['supplier_id'];
        $result = $di->get('supplier')->getSupplierByID($supplier_id,PDO::FETCH_ASSOC);
        echo json_encode($result[0]);
    }
    if($_POST['fetch'] == 'customer')
    {
        $customer_id = $_POST['customer_id'];
        $result = $di->get('customer')->getCustomerByID($customer_id,PDO::FETCH_ASSOC);
        echo json_encode($result[0]);
    }
    if($_POST['fetch'] == 'sales')
    {
        $customer_id = $_POST['sales_id'];
        $result = $di->get('sales')->getSalesByID($customer_id,PDO::FETCH_ASSOC);
        echo json_encode($result[0]);
    }

}


if(isset($_POST['editCategory']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        //  Util::dd($_POST);
        $result = $di->get('category')->update($_POST,$_POST['category_id']);

        //Util::dd($_POST['category_id']);
        //Util::dd($result);
        
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Category Error");
                Util::redirect("manage-category.php");
                break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Category Success");
                Util::redirect("manage-category.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors',serialize($di->get('category')->getValidator()->errors()));//object mai hai ya array hai to text mai store kar sakeee!
                Util::redirect("manage-category.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-category.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}


if(isset($_POST['editSupplier']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        //Util::dd("INSIDE ROUTING");
        //Util::dd($_POST);
        $result = $di->get('supplier')->update($_POST,$_POST['supplier_id']);

        
        //Util::dd($result);
        
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Supplier Error");
                Util::redirect("manage-supplier.php");
                break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Supplier Success");
                Util::redirect("manage-supplier.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors',serialize($di->get('supplier')->getValidator()->errors()));//object mai hai ya array hai to text mai store kar sakeee!
                Util::redirect("manage-supplier.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-supplier.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}



if(isset($_POST['editCustomer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        //Util::dd("INSIDE ROUTING");
        //Util::dd($_POST);
        $result = $di->get('customer')->update($_POST,$_POST['customer_id']);

        
        //Util::dd($result);
        
        switch($result)
        {
            case UPDATE_ERROR:
                Session::setSession(UPDATE_ERROR,"Update Customer Error");
                Util::redirect("manage-customer.php");
                break;
            case UPDATE_SUCCESS:
                Session::setSession(UPDATE_SUCCESS,"Update Customer Success");
                Util::redirect("manage-customer.php");
                break;
            case VALIDATION_ERROR:
                Session::setSession('validation',"Validation Error");
                Session::setSession('old',$_POST);
                Session::setSession('errors',serialize($di->get('customer')->getValidator()->errors()));//object mai hai ya array hai to text mai store kar sakeee!
                Util::redirect("manage-customer.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-customer.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}




if(isset($_POST['deleteCategory']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('category')->delete($_POST['record_id']);

        //Util::dd($result);
        
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Category Error");
                Util::redirect("manage-category.php");
                break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Category Success");
                Util::redirect("manage-category.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-category.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}


if(isset($_POST['deleteCustomer']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('customer')->delete($_POST['record_id']);

        //Util::dd($result);
        
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Customer Error");
                Util::redirect("manage-customer.php");
                break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Customer Success");
                Util::redirect("manage-customer.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-customer.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}
if(isset($_POST['deleteSupplier']))
{
    if(Util::verifyCSRFToken($_POST))
    {
        
        $result = $di->get('supplier')->delete($_POST['record_id']);

        //Util::dd($result);
        
        switch($result)
        {
            case DELETE_ERROR:
                Session::setSession(DELETE_ERROR,"Delete Supplier Error");
                Util::redirect("manage-supplier.php");
                break;
            case DELETE_SUCCESS:
                Session::setSession(DELETE_SUCCESS,"Delete Supplier Success");
                Util::redirect("manage-supplier.php");
                break;
        }
    }else{
        //errorpage 
        Session::setSession("csrf","CSRF ERROR");
        Util::redirect("manage-supplier.php");//Need to change this, actually we be redirecting to some error page indicating Unauthorized access.

    }
}
//Anonymous Routing Ajax To Fetch Data
if(isset($_POST['getCategories'])){
    echo json_encode($di->get('category')->all());
}
if(isset($_POST['getProductsByCategoryID'])){
    $category_id = $_POST['categoryID'];
    //Util::dd($category_id);
    echo json_encode($di->get('product')->getProductsByCategoryID($category_id));

}
if(isset($_POST['getSPByProductID'])){
    $product_id = $_POST['productID'];
    echo json_encode($di->get('product')->getSPByProductID($product_id));

}
if(isset($_POST['getCustomerByEmail'])){  
    //Util::dd($_POST);
    $customer_email = $_POST['email_id'];
    echo json_encode($di->get('customer')->getCustomerByEmail($customer_email));
}

if(isset($_POST['createInvoiceAndAddInSales'])){  
    //Util::dd($_POST);
    $customer_id = $_POST['customer_id'];
    echo json_encode($di->get('sales')->createInvoiceAndAddInSales($customer_id));
    echo json_encode($di->get('sales')->addSales($_POST));
}

?>
