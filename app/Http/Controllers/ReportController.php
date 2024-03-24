<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\User;

class ReportController extends Controller
{
    public function fetchCategoryCount(){

          // Get distinct categories with names
          $categories = Category::select('id', 'name')->get();

          // Check if request year exists
          if (request()->has('year')) {
              // Get the selected year from the request
              $selected_year = request('year');
          } else {
              // Use the current year as the default
              $selected_year = date('Y');
          }
  
          // Initialize the report array
          $report = [];
  
          // Loop through categories and months to populate the report
          foreach ($categories as $category) {
              $row_data = ['category' => $category->name];
  
              for ($month = 1; $month <= 12; $month++) {
                  $complaint_count = Complaint::where('category_id', $category->id)
                      ->whereYear('created_at', $selected_year)
                      ->whereMonth('created_at', $month)
                      ->count();
  
                  $row_data['month_' . $month] = $complaint_count;
              }
  
              $report[] = $row_data;
          }

          return view('reports.category_reports', compact('report', 'selected_year'));
    }

    public function fetchStatusCount(){

        // Count status by technician_id
        $users_status_count = User::where('role', 'technician')
        ->orWhere('role', 'supervisor')    
        ->withCount([
            'taskAssigned as Baharu' => function ($query) {
                $query->where('status', 'Baharu');
            },
            'taskAssigned as Dijawab' => function ($query) {
                $query->where('status', 'Dijawab');
            },
            'taskAssigned as Selesai' => function ($query) {
                $query->where('status', 'Selesai');
            },
            'taskAssigned as Dinilai' => function ($query) {
                $query->where('status', 'Dinilai');
            },
            'taskAssigned as KIV' => function ($query) {
                $query->where('status', 'KIV');
            },
        ])
        ->get();


        return view('reports.status_reports', compact('users_status_count'));
    }
}
