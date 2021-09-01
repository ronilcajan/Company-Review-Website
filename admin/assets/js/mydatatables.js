$(document).ready(function(){

    $('#borrowersTable').DataTable();
    
    $('#btransTable').DataTable({
        "order": [[ 0, "des" ]],
    });
    $('#bloanTable').DataTable({
        "order": [[ 5, "asc" ]],
    });
    $('#transactionTable').DataTable({
        "order": [[ 0, "des" ]],
    });
    $('#loanTable').DataTable({
        "order": [[ 8, "asc" ]],
    });
})