<?php
class Supplier
{
    private $table = "suppliers";
    private $columns = ['id', 'first_name','last_name','gst_no','phone_no','email_id','company_name'];
    protected $di;
    private $database;
    private $validator;
    public function __construct(DependencyInjector $di)
    {
        $this->di = $di;
        $this->database = $this->di->get('database');
    }
    public function getValidator(){
        return $this->validator;
    }
    public function ValidateData($data)
    {
        //Util::dd("Inside ValidateData");
        $this->validator = $this->di->get('validator');
        //Util::dd($data);
        $this->validator = $this->validator->check($data,[
            'first_name'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>20,

            ],
            'last_name'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>20,
                'unique'=>$this->table
            ],
            'gst_no'=>[
                'required'=>true,
                'minlength'=>15,
                'maxlength'=>15,
                'unique'=>$this->table
            ],
            'phone_no'=>[
                'required'=>true,
                'minlength'=>10,
                'maxlength'=>15,
                'unique'=>$this->table
            ],
            'email_id'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>40,
                'unique'=>$this->table
            ],
            'company_name'=>[
                'required'=>true,
                'minlength'=>1,
                'maxlength'=>60,
                'unique'=>$this->table
            ]
        ]);
        
    }
    public function ValidateEditData($data,$id)
    {
        //Util::dd("Inside ValidateData");
        $this->validator = $this->di->get('validator');
        //Util::dd($data);
        $this->validator = $this->validator->check($data,[
            'first_name'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>20,

            ],
            'last_name'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>20,
                'uniqueCurrentRecord'=>$this->table ."." . $id 
            ],
            'gst_no'=>[
                'required'=>true,
                'minlength'=>15,
                'maxlength'=>15,
                'uniqueCurrentRecord'=>$this->table ."."  . $id 
            ],
            'phone_no'=>[
                'required'=>true,
                'minlength'=>10,
                'maxlength'=>15,
                'uniqueCurrentRecord'=>$this->table ."." . $id 
            ],
            'email_id'=>[
                'required'=>true,
                'minlength'=>3,
                'maxlength'=>40,
                'uniqueCurrentRecord'=>$this->table ."." . $id 
            ],
            'company_name'=>[
                'required'=>true,
                'minlength'=>1,
                'maxlength'=>60,
                'uniqueCurrentRecord'=>$this->table ."." . $id 
            ]
        ]);
        
    }

    public function addSupplier($data)
    {
        
        //VALIDATE DATA
        $this->ValidateData($data);

        //INSERT DATA IN DATABASE
        if(!$this->validator->fails())
        {
            try{
                $this->database->beginTransaction();
                $data_to_be_inserted = [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gst_no' => $data['gst_no'],
                    'phone_no' => $data['phone_no'],
                    'email_id' => $data['email_id'],
                    'company_name' => $data['company_name']
                ];
                $category_id = $this->database->insert($this->table,$data_to_be_inserted);
                $this->database->commit();
                return ADD_SUCCESS;
            }
            catch(Exception $e)
            {
                $this->database->rollBack();
                return ADD_ERROR;
            }
        }
        return VALIDATION_ERROR;
    }


    public function getSupplierByID($id, $fetchMode = PDO::FETCH_OBJ)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = {$id} AND deleted = 0";
        $result = $this->database->raw($query,$fetchMode);
        return $result;
    }



    public function getJSONDataForDataTable($draw, $search_parameter, $order_by, $start, $length)
    {
        $query = "SELECT * FROM {$this->table} WHERE deleted = 0";
        $totalRowCountQuery = "SELECT COUNT(*) as total_count FROM {$this->table} WHERE deleted = 0";
        $filteredRowCountQuery = "SELECT COUNT(*) as total_count FROM {$this->table} WHERE deleted = 0";

        if($search_parameter != null)
        {
            $query .= " AND first_name LIKE '%{$search_parameter}%' OR last_name LIKE '%{$search_parameter}%'";
            $filteredRowCountQuery .= " AND first_name LIKE '%{$search_parameter}%' OR last_name LIKE '%{$search_parameter}%'";
        }
        //Util::dd($this->columns[$order_by[0]['column']]);
        if($order_by != null)
        {
            $query .= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}";
            $filteredRowCountQuery .= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}";
        }
        else
        {
            $query .= " ORDER BY {$this->columns[0]} ASC";
            $filteredRowCountQuery .= " ORDER BY {$this->columns[0]} ASC";
        }
        if($length != -1)
        {
            $query .= " LIMIT {$start}, {$length}";
        }
        //Util::dd($query);
        $totalRowCountResult = $this->database->raw($totalRowCountQuery);
        $numberOfTotalRows = is_array($totalRowCountResult) ? $totalRowCountResult[0]->total_count : 0;

        $filteredRowCountResult = $this->database->raw($filteredRowCountQuery);
        $numberOfFilteredRows = is_array($totalRowCountResult) ? $filteredRowCountResult[0]->total_count : 0;

        $fetchedData = $this->database->raw($query);
        $data = [];
        $basePages = BASEPAGES;
        $numRows = is_array($fetchedData) ? count($fetchedData) : 0;
        for($i=0;$i<$numRows;$i++){
            $subArray = [];
            $subArray[] = $i+1;
            $subArray[] = $fetchedData[$i]->first_name;
            $subArray[] = $fetchedData[$i]->last_name;
            $subArray[] = $fetchedData[$i]->gst_no;
            $subArray[] = $fetchedData[$i]->phone_no;
            $subArray[] = $fetchedData[$i]->email_id;
            $subArray[] = $fetchedData[$i]->company_name;
            $subArray[] = <<<BUTTONS
            <a href="{$basePages}edit-supplier.php?id={$fetchedData[$i]->id}" class='btn btn-outline-primary btn-sm edit'><i class="fas fa-pencil-alt"></i></a>
            <button class = 'btn btn-outline-danger btn-sm delete' data-id='{$fetchedData[$i]->id}' data-toggle='modal' data-target='#deleteModal'><i class="fas fa-trash-alt"></i></button>
BUTTONS;
    
            $data[] = $subArray;
        }
    
        $output = array(
            'draw'=>$draw,
            'recordsTotal'=>$numberOfTotalRows,
            'recordsFiltered'=>$numberOfFilteredRows,
            'data'=>$data
        );
        echo json_encode($output);
    }


    public function update($data,$id)
    {   
        $data_to_be_updated = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gst_no' => $data['gst_no'],
            'phone_no' => $data['phone_no'],
            'email_id' => $data['email_id'],
            'company_name' => $data['company_name']
        ];
        //Util::dd($data_to_be_updated);
        $this->validateEditData($data_to_be_updated,$data['supplier_id']);
        if(!$this->validator->fails())
        {
            try{
                $this->database->beginTransaction();
                $this->database->update($this->table,$data_to_be_updated,"id = {$id}");
                $this->database->commit();
                return UPDATE_SUCCESS;
            }catch(Exception $e){
                $this->database->rollBack();
                return UPDATE_ERROR;
            }
        }
        else{
            return VALIDATION_ERROR;
        }
        
    }



    public function delete($id){
        try{
            $this->database->beginTransaction();
            //Util::dd($this->table,"id={$id}");
            $this->database->delete($this->table,"id={$id}");
            $this->database->commit();
            return DELETE_SUCCESS;
        }catch(Exception $e){
            $this->database->rollBack();
            return DELETE_ERROR;
        }
    }

    
}

    
    
/**
 * MultiLine String Definition
 * 
 * $var = >>>KINJAL
 */
?>

