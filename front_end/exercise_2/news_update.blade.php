<style>
/* Admin News CSS - Simplified */

/* Layout - Container and Title */
.admin-container {
    padding: 20px; /* Padding around */
    max-width: 1200px; /* Width limit */
    margin: 0 auto; /* Center align */
}

.admin-title {
    color: #333; /* Dark gray color */
    border-bottom: 2px solid #007bff; /* Blue bottom border */
    padding-bottom: 10px; /* Bottom padding */
    margin-bottom: 20px; /* Bottom margin */
}

/* Table - Data table */
.admin-table {
    width: 100%; /* Full width */
    border-collapse: collapse; /* Merge borders */
    margin-top: 20px; /* Top margin */
}

.admin-table thead tr {
    background-color: #007bff; /* Blue header */
    color: white; /* White text */
}

.admin-table th,
.admin-table td {
    padding: 10px; /* Cell padding */
    border: 1px solid #ddd; /* Gray border */
}

.admin-table tbody tr:nth-child(even) {
    background-color: #f9f9f9; /* Light gray for even rows */
}

/* Form - Edit form */
.admin-form {
    background: white; /* White background */
    padding: 30px; /* Internal padding */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Drop shadow */
    max-width: 800px; /* Maximum width */
    margin: 20px auto; /* Center align */
}

.form-group {
    margin-bottom: 20px; /* Space between form fields */
}

.form-label {
    display: block; /* Display as block */
    margin-bottom: 5px; /* Bottom margin */
    font-weight: bold; /* Bold text */
    color: #333; /* Dark gray color */
}

.form-input,
.form-textarea {
    width: 100%; /* Full width */
    padding: 10px; /* Internal padding */
    border: 1px solid #ddd; /* Light gray border */
    border-radius: 4px; /* Rounded corners */
}

.form-input:focus,
.form-textarea:focus {
    outline: none; /* Remove default outline */
    border-color: #007bff; /* Blue border on focus */
}

/* Links - Links styling */
.admin-link {
    color: #007bff; /* Blue color */
    text-decoration: none; /* No underline */
}

.admin-link:hover {
    text-decoration: underline; /* Underline on hover */
}

/* Buttons - Button styling */
.btn {
    padding: 8px 16px; /* Button padding */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor */
    text-decoration: none; /* No underline */
    display: inline-block; /* Inline block display */
}

.btn-edit {
    background: #28a745; /* Edit button - green */
    color: white; /* White text */
    margin-right: 5px; /* Right margin */
}

.btn-edit:hover {
    background: #218838; /* Darker on hover */
}

.btn-delete {
    background: #dc3545; /* Delete button - red */
    color: white; /* White text */
}

.btn-delete:hover {
    background: #c82333; /* Darker on hover */
}

.btn-submit {
    background: #007bff; /* Submit button - blue */
    color: white; /* White text */
    padding: 12px 24px; /* Larger padding */
}

.btn-submit:hover {
    background: #0056b3; /* Darker on hover */
}

.btn-secondary {
    background: #6c757d; /* Back button - gray */
    color: white; /* White text */
    padding: 10px 24px; /* Button padding */
    margin-right: 10px; /* Right margin */
}

.btn-secondary:hover {
    background: #545b62; /* Darker on hover */
    color: white; /* Keep white text */
}

/* Validation - Error messages */
.error-message {
    color: #dc3545; /* Red color for error */
    font-size: 14px; /* Smaller font size */
    margin-top: 5px; /* Top margin */
    display: block; /* Display as block */
}

/* Utils - Utility classes */
.inline-form {
    display: inline; /* Display inline */
}

.btn-group {
    margin-top: 20px; /* Top margin */
}
</style>

<div class="admin-container">
    <h1 class="admin-title">{{ $pageName }}</h1>
    
    <div class="admin-form">
        <form method="post" action="/laravel/admin/news/update/{{ $news->id }}">
            @method('PATCH')
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}">
            
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ $news->title }}">
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-input" value="{{ $news->email }}">
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-textarea" rows="6">{{ $news->description }}</textarea>
            </div>
            
            <div class="btn-group">
                <a href="/laravel/admin/news" class="btn btn-secondary">← Back to List</a>
                <button type="submit" class="btn btn-submit">Update News</button>
            </div>
        </form>
    </div>
</div>