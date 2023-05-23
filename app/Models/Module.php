<?php

namespace App\Models;

use App\Traits\PopulateTenantID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

/**
 * Class Module
 *
 * @property int $id
 * @property string $name
 * @property string $tenant_id
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @mixin Model
 * @property string|null $route
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRoute($value)
 */
class Module extends Model
{
    use QueryCacheable, BelongsToTenant, PopulateTenantID;

//    public $cacheFor = 3600; // cache time, in seconds

    /**
     * @var string
     */
    public $table = 'modules';

    const STATUS_ALL = 2;
    const ACTIVE = 1;
    const INACTIVE = 0;

    const STATUS_ARR = [
        self::STATUS_ALL => 'All',
        self::ACTIVE     => 'Active',
        self::INACTIVE   => 'Deactive',
    ];

    const FILTER_STATUS_ARR = [
        0 => 'All',
        1 => 'Active',
        2 => 'Deactive',
    ];

    /** @var string[]* */
    public $fillable = [
        'name',
        'is_active',
        'route',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'      => 'string',
        'is_active' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|unique:modules,name',
    ];

    const Doctor = [
        "Patients",
        "Doctors",
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Income",
        "Expense",
        "Accounts",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Blood Banks",
        "Blood Donors",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Pathology Categories",
        "Pathology Tests",
        "Radiology Categories",
        "Radiology Tests",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Cases",
        "Case Handlers",
        "My Payrolls",
        "Patient Cases",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
        "Employee Noticeboard",
    ];

    const Patient = [
        "Patients",
        "Doctors",
        "IPD Patients",
        "OPD Patients",
        "Employee Payrolls",
        "Bills",
        "Bed Assigns",
        "Invoices",
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "SMS",
        "Accounts",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bed Types",
        "Beds",
        "Blood Banks",
        "Blood Donors",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Diagnosis Categories",
        "Pathology Categories",
        "Pathology Tests",
        "Radiology Categories",
        "Radiology Tests",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Schedules",
        "Cases",
        "Case Handlers",
        "My Payrolls",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Live Meetings",
        "Vaccinations",
        "Employee Bills",
    ];

    const Nurse = [
        "Patients",
        "Doctors",
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "SMS",
        "IPD Patients",
        "OPD Patients",
        "Accounts",
        "Employee Payrolls",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Blood Banks",
        "Blood Donors",
        "Documents",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Appointments",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Diagnosis Categories",
        "Diagnosis Tests",
        "Pathology Categories",
        "Pathology Tests",
        "Radiology Categories",
        "Radiology Tests",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Schedules",
        "Prescriptions",
        "Cases",
        "Case Handlers",
        "Patient Admissions",
        "My Payrolls",
        "Patient Cases",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
        "Employee Noticeboard",
    ];

    const Accountant = [
        "Notice Boards",
        "Patients",
        "Doctors",
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "IPD Patients",
        "OPD Patients",
        "Payment Reports",
        "Advance Payments",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Blood Banks",
        "Blood Donors",
        "Documents",
        "Document Types",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Appointments",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Diagnosis Categories",
        "Diagnosis Tests",
        "Pathology Categories",
        "Pathology Tests",
        "Radiology Categories",
        "Radiology Tests",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Schedules",
        "Prescriptions",
        "Cases",
        "Case Handlers",
        "Patient Admissions",
        "My Payrolls",
        "Patient Cases",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
        "Employee Noticeboard",
    ];

    const Receptionist = [
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "Accounts",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Blood Banks",
        "Blood Donors",
        "Documents",
        "Document Types",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Schedules",
        "Prescriptions",
        "Cases",
        "My Payrolls",
        "Blood Donations",
        "Blood Issues",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
        "Employee Noticeboard",
    ];

    const CASE_HANDLER = [
        "Patients",
        "Accountants",
        "Medicines",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "IPD Patients",
        "OPD Patients",
        "Accounts",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Blood Banks",
        "Blood Donors",
        "Documents",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Appointments",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Notice Boards",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Diagnosis Categories",
        "Diagnosis Tests",
        "Pathology Categories",
        "Pathology Tests",
        "Radiology Categories",
        "Radiology Tests",
        "Medicine Categories",
        "Medicine Brands",
        "Doctor Departments",
        "Schedules",
        "Prescriptions",
        "Cases",
        "Case Handlers",
        "My Payrolls",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
    ];

    const LAB_TECHNICIAN = [
        "Doctors",
        "Patients",
        "Accountants",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "SMS",
        "IPD Patients",
        "OPD Patients",
        "Accounts",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Documents",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Appointments",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Notice Boards",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Pathology Categories",
        "Radiology Categories",
        "Doctor Departments",
        "Schedules",
        "Prescriptions",
        "Cases",
        "Case Handlers",
        "Patient Admissions",
        "My Payrolls",
        "Patient Cases",
        "Testimonial",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
    ];

    const Pharmacist = [
        "Patients",
        "Doctors",
        "Accountants",
        "Nurses",
        "Receptionists",
        "Lab Technicians",
        "Pharmacists",
        "Birth Reports",
        "Death Reports",
        "Investigation Reports",
        "Operation Reports",
        "Income",
        "Expense",
        "IPD Patients",
        "OPD Patients",
        "Accounts",
        "Invoices",
        "Payments",
        "Payment Reports",
        "Advance Payments",
        "Bills",
        "Bed Types",
        "Beds",
        "Bed Assigns",
        "Blood Banks",
        "Blood Donors",
        "Documents",
        "Document Types",
        "Services",
        "Insurances",
        "Packages",
        "Ambulances",
        "Ambulances Calls",
        "Appointments",
        "Call Logs",
        "Visitors",
        "Postal Receive",
        "Postal Dispatch",
        "Notice Boards",
        "Mail",
        "Enquires",
        "Charge Categories",
        "Charges",
        "Doctor OPD Charges",
        "Items Categories",
        "Items",
        "Item Stocks",
        "Issued Items",
        "Diagnosis Categories",
        "Diagnosis Tests",
        "Pathology Categories",
        "Radiology Categories",
        "Doctor Departments",
        "Schedules",
        "Cases",
        "Case Handlers",
        "Patient Admissions",
        "My Payrolls",
        "Patient Cases",
        "Testimonial",
        "Blood Donations",
        "Blood Issues",
        "Live Consultations",
        "Vaccinated Patients",
        "Vaccinations",
        "Employee Bills",
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'tenant_id', 'tenant_id');
    }
}