<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Preview</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.3.2/dist/html2canvas.min.js"></script>
    <!-- Include Bootstrap CSS and JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Check/Uncheck All button and Print Invoice button -->
    <button type="button" class="btn btn-sm btn-info" id="checkBoxSelectUnselect">Check/Uncheck All</button>
    <button type="button" class="btn btn-sm btn-primary" id="printInvoice" style="display: none;">Print Invoice</button>

    <!-- Include necessary libraries -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    <!-- Your input field -->
    <input type="text" id="datetimepicker" />

    <script>
        $(document).ready(function() {
            // Set the default value to today's date
            $('#datetimepicker').val(moment().format('Y-MM-DD LT'));

            // Initialize datetimepicker
            $('#datetimepicker').datetimepicker({
                format: 'Y-MM-DD LT'
            });
        });
    </script>

    <!-- Table with checkboxes -->
    <table>
        <tr>
            <td><input type="checkbox" name="invoice_print" class="invoice-checkbox" id="tbl-data-invoice-print-1"> 1
            </td>
            <td><input type="checkbox" name="invoice_print" class="invoice-checkbox" id="tbl-data-invoice-print-2"> 2
            </td>
            <!-- Add more rows with checkboxes as needed -->
        </tr>
    </table>

    <!-- Bootstrap modal for POS previews -->
    <div class="modal fade" id="posModal" tabindex="-1" role="dialog" aria-labelledby="posModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="posModalLabel">POS Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="posModalBody">
                    <!-- POS preview content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Event listener for Check/Uncheck All button
            $('#checkBoxSelectUnselect').on('click', function() {
                var allChecked = $('.invoice-checkbox').length === $('.invoice-checkbox:checked').length;
                $('.invoice-checkbox').prop('checked', !allChecked);
                updatePrintButtonVisibility();
            });

            // Event listener for Print Invoice button
            $('#printInvoice').on('click', function() {
                var checkedValues = $('.invoice-checkbox:checked').map(function() {
                    return this.id.replace('tbl-data-invoice-print-',
                        ''); // Extract product ID from checkbox ID
                }).get();

                // Generate POS previews for each selected checkbox
                $.each(checkedValues, function(index, value) {
                    generatePosPreview(value);
                });

                // Open the modal
                $('#posModal').modal('show');
            });

            // Function to update the visibility of the Print Invoice button
            function updatePrintButtonVisibility() {
                var anyChecked = $('.invoice-checkbox:checked').length > 0;
                $('#printInvoice').toggle(anyChecked);
            }

            // Function to generate POS preview for a specific checkbox
            function generatePosPreview(productID) {
                // Your existing logic to set content based on the selected checkbox
                $("#invoice_number").html($("#tbl-data-invoice-" + productID).html());
                $(".customerName").html($("#tbl-data-name-" + productID).text());
                $(".amount").html($("#tbl-data-amount-" + productID).text());
                $(".address").html($("#tbl-data-address-" + productID).text());
                $(".phone").html($("#tbl-data-phone-" + productID).text());
                $(".product").html($("#tbl-data-product-" + productID).text());
                $(".note").html($("#tbl-data-note-" + productID).text());

                // Capture the content as an image using html2canvas
                var element = $("#invoice-POS-Multiple")[0];

                html2canvas(element).then(function(canvas) {
                    // Convert the canvas to an image URL
                    var imageURL = canvas.toDataURL("image/png");

                    // Insert the image into the modal body
                    $('#posModalBody').append('<img src="' + imageURL + '" alt="POS Preview">');
                });
            }

            // Event listener for individual checkboxes
            $('.invoice-checkbox').on('change', function() {
                updatePrintButtonVisibility();
            });
        });
    </script>

</body>

</html>
