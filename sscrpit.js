$(document).ready(function () {
    // Attach an input event listener to the date input
    $('#searchDateInput').on('input', function () {
        // Get the entered date
        var searchDate = $(this).val();

        // Make an AJAX request to the server
        $.ajax({
            type: 'GET',
            url: 'searchroll.php',
            data: { searchDate: searchDate },
            success: function (data) {
                // Update the search results div with the retrieved data
                $('#searchResults').html(data);
            }
        });
    });
});
