$(document).ready(function(){
    $('#usersTable').DataTable();
    $('#estabTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'establishment_report',
                "title":'List of Establishment',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'establishment_report',
                "title":'List of Establishment',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'establishment_report',
                "title":'List of Establishment',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,2,3,4,5,6],
                   
                },
            }
        ]
    });
    $('#reviewTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'reviews_report',
                "title":'List of Reviews',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'reviews_report',
                "title":'List of Reviews',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'reviews_report',
                "title":'List of Reviews',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6],
                   
                },
            }
        ]
    });
    $('#commentsTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'comments_report',
                "title":'List of Comments',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'comments_report',
                "title":'List of Comments',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'comments_report',
                "title":'List of Comments',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3],
                   
                },
            }
        ]
    });
    $('#catTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'categories_report',
                "title":'List of Categories',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'categories_report',
                "title":'List of Categories',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'categories_report',
                "title":'List of Categories',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2],
                   
                },
            }
        ]
    });
    $('#inquiTable').DataTable({
        "oLanguage": {
            "sLengthMenu": "_MENU_ Entries"
        },
        dom: 'Blfrtip',
        buttons: [
            { 
                "extend": 'csv', 
                "text":'CSV',
                "filename": 'inquiries_report',
                "title":'List of Customers Inquiry',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5],
                   
                },
            },
            { 
                "extend": 'print', 
                "text":'PRINT',
                "filename": 'inquiries_report',
                "title":'List of Customers Inquiry',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5],
                   
                },
            },
            { 
                "extend": 'pdf', 
                "text":'PDF',
                "filename": 'inquiries_report',
                "title":'List of Customers Inquiry',
                "className": 'btn btn-primary btn-sm text-light mb-2',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5],
                   
                },
            }
        ]
    });
})