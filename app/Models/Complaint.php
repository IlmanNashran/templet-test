<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Complaint extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'technician_id','id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class,'supervisor_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatusBadgeClass()
    {
        switch ($this->status) {
            case 'Selesai':
                return 'badge-primary';
            case 'Baharu':
                return 'badge-warning';
            case 'Dijawab':
                return 'badge-success';
            case 'KIV':
                return 'badge-danger';
            case 'Ditolak':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }

    public function generateRecordNumber($date)
    {   
        // Get the formatted year (e.g., 23 for 2023)
        $formattedDate = Carbon::createFromFormat('Y-m-d', $date)->format('y');

        // Get the count of records for the given date
        $recordCount = Complaint::whereYear('created_at', Carbon::parse($date)->year)
            ->whereMonth('created_at', Carbon::parse($date)->month)
            ->count();

        // Convert the month to a letter (A for January, B for February, and so on)
        $monthLetter = chr(65 + Carbon::parse($date)->month - 1);

        // Add 1 to the count to create the next record number
        $nextRecordNumber = $recordCount + 1;

        // Format the record number with the desired pattern
        $formattedRecordNumber = sprintf('%05d', $nextRecordNumber); // Assuming at most five digits

        // Concatenate the date, month letter, and record number to create the final record number
        $finalRecordNumber = $formattedDate . $monthLetter . $formattedRecordNumber;

        return $finalRecordNumber;
    }


}
