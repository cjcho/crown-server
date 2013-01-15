<?php
class ERestHelperScopes extends CActiveRecordBehavior
{

  public function limit($limit)
  {
    $this->Owner->getDbCriteria()->mergeWith(array(
      'limit'=>$limit
    ));
    return $this->Owner;
  }

  public function offset($offset)
    {
    $this->Owner->getDbCriteria()->mergeWith(array(
      'offset'=>$offset
    ));
    return $this->Owner;
  }

  public function orderBy($field, $dir='ASC')
  {
    if(empty($field)) return $this->Owner;

    if(!is_array($orderListItems = $field))
    {
      $this->Owner->getDbCriteria()->mergeWith(array(
        'order'=>$this->getSortSQL($field, $dir)
      ));
      return $this->Owner;
    }
    else
    {
      $orderByStr = "";
      foreach($orderListItems as $orderListItem)
        $orderByStr .= ((!empty($orderByStr))? ", " : "") . $this->getSortSQL($orderListItem['property'], $orderListItem['direction']);
      
      $this->Owner->getDbCriteria()->mergeWith(array(
        'order'=>$orderByStr
      ));
      return $this->Owner;
    }
  }

  public function filter($filter)
  {

    if(empty($filter)) return $this->Owner;
    
    if(!is_array($filter))
      $filterItems = CJSON::decode($filter);
    else
      $filterItems = $filter;
  
    $query = "";
    $params = array();
    
    foreach($filterItems as $filterItem)
    {
      if(!is_null($filterItem['property']))
      {

        //Check if array, means relational filtering
        if(is_array($filterItem['property'])){
          $depth = count($filterItem['property']) ;
          
          $cType = $this->getFilterCType($filterItem['property'][$depth - 1]) ;

          $property = $filterItem['property'][$depth - 2].'.'.$filterItem['property'][$depth - 1] ;
        }
        else{
          $property = $this->getFilterAlias().'.'.$filterItem['property'] ;

          $cType = $this->getFilterCType($filterItem['property']);
        }
        $property_key = str_replace('.', '_', $property); //special key, $params doesnt like keys with dots

        //Filter!
        if(isset($filterItem['compare'])
        && $filterItem['compare'] == 'strict'){

          if($filterItem['value'] == 'null'){
            $compare = ' IS NULL' ;
          }
          else{
            $compare = " = :" . $property_key;
            $params[":" . $property_key] = $filterItem['value'];          
          }


        }
        elseif(isset($filterItem['compare'])
        && $filterItem['compare'] == 'is not'){

          $compare = " != :" . $property_key;
          $params[":" . $property_key] = $filterItem['value'] ;

        }
        else{

          $compare = " LIKE :" . $property_key;
          $params[":" . $property_key] = '%' . $filterItem['value'] . '%';

        }

        if(empty($query)){
          $query .= '(' ;
        }
        else{
          if (isset($filterItem['compare'])
          && $filterItem['compare'] == 'strict') {
            $query .= ' AND ' ;
          }
          else{
            $query .= ' OR ' ;
          }
        }

        $query .= $property . $compare;
      
      }

    }
    if(empty($query)) return $this->Owner;

    $query .= ")";

    $this->Owner->getDbCriteria()->mergeWith(array(
      'condition'=>$query, 'params'=>$params
    ));
    return $this->Owner;
  }

  private function getFilterCType($property)
  {
    if($this->Owner->hasAttribute($property))
      return $this->Owner->metaData->columns[$property]->type;
    
    return 'text';
  }

  private function getFilterAlias()
  {
    return $this->Owner->getTableAlias(false, false);
  }

  private function getSortSQL($field, $dir='ASC')
  {
    if(is_array($field)){
      //Field key is array, lets use it to order by relational table
      $depth = count($field) ;
      return $field[$depth - 2] . '.' . $field[$depth - 1] . ' ' . $dir ;
    }
    else{
      return $this->Owner->getTableAlias(false, false) . '.' . $field . ' ' . $dir ;    
    }
  }

}
