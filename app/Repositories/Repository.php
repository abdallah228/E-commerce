<?php
namespace App\Repositories;
use  App\Http\Enterface\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

Class Repository implements RepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

public function all()
{
    return $this->model->all();
}//end index function
public function create(array $data)
{
    return $this->model->create();
}
public function update(array $data,$id)
{
    # code...
    $record = $this->model->find($id);
    return $record->update($data);


}//end function update
public function delete($id)
{
    return $this->model->delete($id);

}//end delete function
public function show($id)
{
    return $this->model->findOrFail($id);
}//end function show



########getter######
public function getModel()
{
    return $this->model;
    
}//end get model
public function setModel($model)
{
    $this->model = $model;
    return $this;

}//end set model

    public function with($relations)//eager load database relations
    {
        return $this->model->with($relations);
    }//end with function

}//end class
?>