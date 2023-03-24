<?php

namespace UUOA\OpenSdk\Api;


use UUOA\OpenSdk\Entity\Request\Contact\DepartmentPartListRequest;
use UUOA\OpenSdk\Entity\Request\Contact\DepartmentRequest;
use UUOA\OpenSdk\Entity\Request\Contact\DepartmentTreeStructRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployeeCreateRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployeeDetailRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployeeEditRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployeeHrmRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployeePartListRequest;
use UUOA\OpenSdk\Entity\Request\Contact\EmployersRequest;
use UUOA\OpenSdk\Entity\Response\Contact\EmployeeCreateResponse;
use UUOA\OpenSdk\Entity\Response\Contact\EmployeeDetailResponse;
use UUOA\OpenSdk\Entity\Response\Contact\EmployeeEditResponse;
use UUOA\OpenSdk\Entity\Response\ItemsHasPagesResponse;
use UUOA\OpenSdk\Entity\Response\ItemsResponse;

/**
 * ISV开放平台/组织结构
 */
class ContactApi extends BaseApi
{

    const API_EMPLOYERS = '/open/apis/contact/employee'; // 人员列表 GET
    const API_EMPLOYEE_DETAIL = '/open/apis/contact/employee/detail'; // 人员详情 GET
    const API_DEPARTMENT = '/open/apis/contact/department';// 部门列表 GET
    const API_DEPARTMENT_TREE = '/open/apis/contact/tree'; //部门列表（树结构） GET

    const API_EMPLOYEE_HRM = '/open/apis/contact/v1/employee/hrm'; //获取成员花名册信息 GET
    const API_EMPLOYEE_PART_LIST = '/open/apis/contact/v1/employee/part/list'; //根据人员集合获取成员信息 GET
    const API_EMPLOYEE_CREATE = '/open/apis/contact/v1/employee/create'; //新增成员 POST
    const API_EMPLOYEE_LEAVE = '/open/apis/contact/v1/employee/leave'; //员工离职操作 POST
    const API_EMPLOYEE_EDIT = '/open/apis/contact/v1/employee/'; //编辑成员 {employee_id} PUT
    const API_DEPARTMENT_PART_LIST = '/open/apis/contact/v1/department/part/list'; //根据部门集合获取部门信息 GET

    /**
     * @param EmployersRequest $requestParams
     * @return ItemsHasPagesResponse
     */
    public function employers(EmployersRequest $requestParams): ItemsHasPagesResponse
    {
        $res = $this->request('get', self::API_EMPLOYERS, $requestParams);
        return new ItemsHasPagesResponse($res);
    }

    public function employeeDetail(EmployeeDetailRequest $requestParams): EmployeeDetailResponse
    {
        $res = $this->request('get', self::API_EMPLOYEE_DETAIL, $requestParams);
        return new EmployeeDetailResponse($res);
    }

    public function department(DepartmentRequest $requestParams): ItemsHasPagesResponse
    {
        $res = $this->request('get', self::API_DEPARTMENT, $requestParams);
        return new ItemsHasPagesResponse($res);
    }

    public function departmentTreeStruct(DepartmentTreeStructRequest $requestParams): ItemsResponse
    {
        $res = $this->request('get', self::API_DEPARTMENT_TREE, $requestParams);
        return new ItemsResponse($res);
    }

    public function departmentPartList(DepartmentPartListRequest $requestParams): ItemsResponse
    {
        $res = $this->request('get', self::API_DEPARTMENT_PART_LIST, $requestParams);
        return new ItemsResponse($res);
    }

    public function employeeHrm(EmployeeHrmRequest $requestParams): ItemsResponse
    {
        $res = $this->request('get', self::API_EMPLOYEE_HRM, $requestParams);
        return new ItemsResponse($res);
    }

    public function employeePartList(EmployeePartListRequest $requestParams): ItemsResponse
    {
        $res = $this->request('get', self::API_EMPLOYEE_PART_LIST, $requestParams);
        return new ItemsResponse($res);
    }

    public function employeeCreate(EmployeeCreateRequest $requestParams): EmployeeCreateResponse
    {
        $res = $this->request('post', self::API_EMPLOYEE_CREATE, $requestParams);
        return new EmployeeCreateResponse($res);
    }

    public function employeeLeave(EmployeeDetailRequest $requestParams): ItemsResponse
    {
        $res = $this->request('post', self::API_EMPLOYEE_LEAVE, $requestParams);
        return new ItemsResponse($res);
    }

    public function employeeEdit(EmployeeEditRequest $requestParams): EmployeeEditResponse
    {
        $res = $this->request('put', self::API_EMPLOYEE_EDIT.$requestParams->getEmployeeId() ?? 0, $requestParams);
        return new EmployeeEditResponse($res);
    }
}