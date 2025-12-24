<style>
/* ========================================
   CSS for Admin News page
   ======================================== */

/* Main container of admin page */
.admin-container {
    padding: 20px; /* Padding around */
    max-width: 1200px; /* Width limit */
    margin: 0 auto; /* Center align */
}

/* Main page title */
.admin-title {
    color: #333; /* Dark gray text color */
    border-bottom: 2px solid #007bff; /* Blue bottom border */
    padding-bottom: 10px; /* Space below text */
    margin-bottom: 20px; /* Space below title */
}

/* ========================================
   Styling for data table
   ======================================== */

.admin-table {
    width: 100%; /* Full width */
    border-collapse: collapse; /* Merge borders together */
    margin-top: 20px; /* Top margin of table */
}

/* Table header */
.admin-table thead tr {
    background-color: #007bff; /* Bootstrap blue background */
    color: white; /* White text */
}

/* General styling for all cells in table */
.admin-table th,
.admin-table td {
    padding: 10px; /* Cell padding */
    border: 1px solid #ddd; /* Light gray border */
}

/* Alternating background color for rows - even rows */
.admin-table tbody tr:nth-child(even) {
    background-color: #f9f9f9; /* Very light gray */
}

/* Alternating background color for rows - odd rows */
.admin-table tbody tr:nth-child(odd) {
    background-color: white; /* White color */
}

/* ========================================
   Styling for links
   ======================================== */

/* Links in table (news title) */
.admin-link {
    color: #007bff; /* Bootstrap blue color */
    text-decoration: none; /* Remove default underline */
}

/* Hover effect for links */
.admin-link:hover {
    text-decoration: underline; /* Show underline on hover */
}

/* ========================================
   Styling for buttons
   ======================================== */

/* Edit button - green color */
.btn-edit {
    background-color: #28a745; /* Bootstrap green background */
    color: white; /* White text */
    border: none; /* Remove default border */
    padding: 5px 12px; /* Button padding */
    border-radius: 4px; /* Slight border radius */
    text-decoration: none; /* Remove underline for <a> tag */
    margin-right: 5px; /* Right margin */
    display: inline-block; /* Display as inline block */
}

/* Hover effect for Edit button */
.btn-edit:hover {
    background-color: #218838; /* Darker green on hover */
    color: white; /* Keep white text */
    text-decoration: none; /* No underline on hover */
}

/* Delete button - red color */
.btn-delete {
    background-color: #dc3545; /* Bootstrap red background */
    color: white; /* White text */
    border: none; /* Remove default border */
    padding: 7px 12px; /* Button padding */
    border-radius: 4px; /* Slight border radius */
    cursor: pointer; /* Pointer cursor on hover */
}

/* Hover effect for Delete button */
.btn-delete:hover {
    background-color: #c82333; /* Darker red on hover */
}

/* ========================================
   Utility Classes
   ======================================== */

/* Form displayed inline with other elements */
.inline-form {
    display: inline; /* Display on same line */
}
</style>

<div class="admin-container">
    <h1 class="admin-title">{{ $pageName }}</h1>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Email</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>
                    <a href="/admin/news/{{$row->id}}" class="admin-link">{{$row->title}}</a>
                </td>
                <td>{{$row->email}}</td>
                <td>
                    <a href="/admin/news/edit/{{$row->id}}" class="btn-edit">Edit</a>
                    <form class="inline-form" method="POST" action="/admin/news/delete/{{$row->id}}" onsubmit="return ConfirmDelete(this)">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>