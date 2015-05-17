<?php
    
class Paging{
    private $pageSize;
    private $res_array;
    private $rowCount;
    private $pageNow;
    private $pageCount;
    
    public function __construct(){
        $this->pageSize = 10;
        $this->pageNow = 1;
    }
        
  /**
     * @return the $pageSize
     */
    public function getPageSize()
    {
        return $this->pageSize;
    }

  /**
     * @return the $res_array
     */
    public function getRes_array()
    {
        return $this->res_array;
    }

  /**
     * @return the $rowCount
     */
    public function getRowCount()
    {
        return $this->rowCount;
    }

  /**
     * @return the $pageNow
     */
    public function getPageNow()
    {
        return $this->pageNow;
    }

  /**
     * @return the $pageCount
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }
  /**
     * @param field_type $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

  /**
     * @param field_type $res_array
     */
    public function setRes_array($res_array)
    {
        $this->res_array = $res_array;
    }

  /**
     * @param field_type $rowCount
     */
    public function setRowCount($rowCount)
    {
        $this->rowCount = $rowCount;
    }

  /**
     * @param field_type $pageNow
     */
    public function setPageNow($pageNow)
    {
        $this->pageNow = $pageNow;
    }

  /**
     * @param field_type $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }
}