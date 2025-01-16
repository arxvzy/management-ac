<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting...</title>
</head>

<body>
    <script>
        // Function to handle redirection
        (function() {
            const whatsAppUrl = @json($url);

            // Open WhatsApp link in a new tab
            const newTab = window.open(whatsAppUrl, '_blank');

            // Check if the new tab was successfully opened
            if (newTab) {
                // Redirect the current tab to another route
                window.location.href = "{{ route('admin.survey.index') }}";
            } else {
                // Fallback if pop-up was blocked
                alert('Tolong izinkan pop-up agar bisa mengirim pesan pengingat.');
            }
        })();
    </script>
    <p>Redirecting...</p>
</body>

</html>
