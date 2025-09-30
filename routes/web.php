<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*Route::group(['middleware' => 'auth', 'prefix' => '/'], function() {
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::group(['prefix' => 'component', 'as' => 'component.'], function() {
        Route::get('accordion', function() {
            return view('mazer.components.accordion');
        })->name('accordion');
    });
});
*/



Route::get('/usermanagement', function () {
    return view('usermanagement');
});

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view(('register'));
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/complaint', function () {
    return view('Complaint');
})->name('complaint');

Route::get('/mycomplaints', function () {
    return view('mycomplaints');
})->name('mycomplaints');


// Complaint details (student view) - mock data per ID for now
Route::get('/complaints/{id}', function ($id) {
    $records = [
        1045 => [
            'id' => 1045,
            'title' => 'Bullying incident in library',
            'category' => 'Bullying',
            'submitted_at' => 'Sept 20, 2025',
            'urgency' => 'High',
            'status' => 'Pending',
            'description' => 'Detailed description of the bullying incident including date, time, and individuals involved.',
            'responses' => [
                ['from' => 'Admin (Guidance Office)', 'message' => 'We have received your complaint and will investigate.', 'time' => 'Sept 21, 2025, 10:15 AM'],
                ['from' => 'Admin (Principal’s Office)', 'message' => 'Meeting scheduled with library staff tomorrow.', 'time' => 'Sept 22, 2025, 2:00 PM'],
            ],
            'timeline' => [
                ['label' => 'Submitted', 'date' => 'Sept 20, 2025'],
                ['label' => 'In Review', 'date' => ''],
                ['label' => 'Resolved', 'date' => ''],
            ],
        ],
        1046 => [
            'id' => 1046,
            'title' => 'Broken air conditioner in Room 304',
            'category' => 'Facility',
            'submitted_at' => 'Sept 18, 2025',
            'urgency' => 'Medium',
            'status' => 'In Review',
            'description' => 'The air conditioner in Room 304 has not been working for 3 days, affecting classes.',
            'responses' => [
                ['from' => 'Admin (Maintenance)', 'message' => 'Technician scheduled for inspection tomorrow.', 'time' => 'Sept 19, 2025, 9:00 AM'],
            ],
            'timeline' => [
                ['label' => 'Submitted', 'date' => 'Sept 18, 2025'],
                ['label' => 'In Review', 'date' => 'Sept 19, 2025'],
                ['label' => 'Resolved', 'date' => ''],
            ],
        ],
        1047 => [
            'id' => 1047,
            'title' => 'Unfair grading system in Math 101',
            'category' => 'Academic',
            'submitted_at' => 'Sept 15, 2025',
            'urgency' => 'Low',
            'status' => 'Resolved',
            'description' => 'Several students reported inconsistencies in grading for Math 101.',
            'responses' => [
                ['from' => 'Admin (Dean’s Office)', 'message' => 'Investigation completed. Grading rubric adjusted.', 'time' => 'Sept 17, 2025, 3:30 PM'],
            ],
            'timeline' => [
                ['label' => 'Submitted', 'date' => 'Sept 15, 2025'],
                ['label' => 'In Review', 'date' => 'Sept 16, 2025'],
                ['label' => 'Resolved', 'date' => 'Sept 17, 2025'],
            ],
        ],
    ];

    $base = [
        'attachments' => [
            ['name' => 'screenshot1.jpg', 'url' => asset('images/4061125.jpg')],
            ['name' => 'notes.pdf', 'url' => '#'],
        ],
        'is_editable' => true,
    ];

    $id = (int) $id;
    $complaint = array_key_exists($id, $records) ? array_merge($records[$id], $base) : array_merge($records[1045], $base);

    return view('complaint-details', compact('complaint'));
})->name('complaints.show');


require_once __DIR__ . "/auth.php";

// Profile page (mock data)
Route::get('/profile', function () {
    $user = [
        'id' => 1,
        'avatar' => asset('assets/compiled/svg/logo.svg'),
        'name' => 'Juan Dela Cruz',
        'role' => 'Student',
        'student_id' => '2025-00123',
        'course' => 'BS Information Technology',
        'year_level' => '3rd Year',
        'email' => 'juan.delacruz@example.com',
        'phone' => '',
        'allow_anonymous' => true,
        'notifications' => [
            'email' => true,
            'sms' => false,
            'in_app' => true,
        ],
        'language' => 'English',
        'complaints' => [
            'total' => 12,
            'open' => 3,
            'in_review' => 5,
            'resolved' => 4,
        ],
        'emergency' => [
            ['label' => 'School Admin', 'number' => '(02) 1234-5678'],
            ['label' => 'Counseling Office', 'number' => '(02) 9876-5432'],
            ['label' => 'Emergency', 'number' => '911'],
        ],
    ];

    return view('profile', compact('user'));
})->name('profile');

// Logout (simple session flush to mock auth)
Route::get('/logout', function () {
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Admin Login Page (UI only)
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Admin Logout
Route::get('/admin/logout', function () {
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('admin.login');
})->name('admin.logout');

// Admin Dashboard (mock data)
Route::get('/admin', function () {
    $stats = [
        'total' => 120,
        'open' => 35,
        'in_review' => 20,
        'resolved' => 65,
        'anonymous' => 15,
    ];

    $byCategory = [
        ['label' => 'Academic', 'count' => 30],
        ['label' => 'Facility', 'count' => 25],
        ['label' => 'Bullying', 'count' => 40],
        ['label' => 'Other', 'count' => 25],
    ];

    $recent = [
        ['id' => 1054, 'student' => 'Anonymous', 'category' => 'Bullying', 'date' => '2025-09-22', 'status' => 'Pending', 'urgency' => 'High'],
        ['id' => 1053, 'student' => 'Maria Clara', 'category' => 'Facility', 'date' => '2025-09-22', 'status' => 'In Review', 'urgency' => 'Medium'],
        ['id' => 1052, 'student' => 'Jose Rizal', 'category' => 'Academic', 'date' => '2025-09-21', 'status' => 'Resolved', 'urgency' => 'Low'],
    ];

    $trend = [
        'labels' => ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        'values' => [20, 35, 28, 37],
    ];

    return view('admin.dashboard', compact('stats', 'byCategory', 'recent', 'trend'));
})->name('admin.dashboard');

// Admin: Complaints Management
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/complaints', function () {
        $complaints = [
            ['id' => 1054, 'student' => 'Anonymous', 'category' => 'Bullying', 'date' => '2025-09-22', 'status' => 'Pending', 'urgency' => 'High'],
            ['id' => 1053, 'student' => 'Maria Clara', 'category' => 'Facility', 'date' => '2025-09-22', 'status' => 'In Review', 'urgency' => 'Medium'],
        ];
        return view('admin.complaints.index', compact('complaints'));
    })->name('complaints.index');

    Route::get('/complaints/{id}', function ($id) {
        $id = (int) $id;
        // Reuse same mock data builder as user side, but include admin-specific flags
        // For now, compose a minimal record
        $record = [
            'id' => $id,
            'title' => 'Complaint #' . $id,
            'category' => 'Bullying',
            'submitted_at' => 'Sept 22, 2025',
            'urgency' => 'High',
            'status' => 'Pending',
            'student' => 'Anonymous',
            'description' => 'Detailed description for admin view.',
            'attachments' => [
                ['name' => 'evidence.jpg', 'url' => asset('images/4061125.jpg')],
            ],
            'assigned' => 'Unassigned',
            'timeline' => [
                ['label' => 'Submitted', 'date' => 'Sept 22, 2025'],
                ['label' => 'In Review', 'date' => ''],
                ['label' => 'Resolved', 'date' => ''],
            ],
            'responses' => [
                ['from' => 'Admin (System)', 'message' => 'Ticket created', 'time' => 'Sept 22, 2025, 9:00 AM']
            ],
        ];
        return view('admin.complaints.show', ['complaint' => $record]);
    })->name('complaints.show');

    // Users
    Route::get('/users', function () {
        $users = [
            ['id' => 1, 'name' => 'Super Admin', 'role' => 'Super Admin', 'email' => 'admin@example.com'],
            ['id' => 2, 'name' => 'Guidance', 'role' => 'Guidance Counselor', 'email' => 'guidance@example.com'],
        ];
        return view('admin.users.index', compact('users'));
    })->name('users.index');

    // Reports
    Route::get('/reports', function () {
        $metrics = [
            'total' => 1245,
            'resolved' => 980,
            'avg_resolution_days' => 3.2,
            'anonymous' => 210,
        ];

        $filters = [
            'range' => 'Last 30 days',
            'category' => 'All',
            'status' => 'All',
        ];

        $trend = [
            'labels' => ['Week 1','Week 2','Week 3','Week 4'],
            'values' => [220, 310, 265, 350],
        ];

        $byCategory = [
            ['label' => 'Academic', 'count' => 45],
            ['label' => 'Facility', 'count' => 30],
            ['label' => 'Bullying', 'count' => 15],
            ['label' => 'Other', 'count' => 10],
        ];

        $byStatus = [
            ['label' => 'Open', 'count' => 120],
            ['label' => 'In Review', 'count' => 145],
            ['label' => 'Resolved', 'count' => 980],
        ];

        $staff = [
            ['name' => 'Guidance Counselor A', 'handled' => 120, 'avg_days' => 2.8, 'rating' => 4.6],
            ['name' => 'Maintenance Lead', 'handled' => 85, 'avg_days' => 3.9, 'rating' => 4.3],
            ['name' => 'Dean’s Office', 'handled' => 60, 'avg_days' => 4.1, 'rating' => 4.1],
        ];

        $distribution = [
            'category_percent' => [45, 30, 15, 10],
            'anonymity' => [
                ['label' => 'Anonymous', 'count' => 210],
                ['label' => 'Identified', 'count' => 1035],
            ],
        ];

        return view('admin.reports', compact('metrics','filters','trend','byCategory','byStatus','staff','distribution'));
    })->name('reports');

    // Settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});
