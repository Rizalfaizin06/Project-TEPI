<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script defer src="{{ asset('js/app.js') }}"></script>
    <title>{{ $title }}</title>
</head>

<body>
    {{-- {{ $student_data }} --}}
    <?php
    var_dump($booking_data);
    // $room_data = json_decode($room_data, true);
    // $picture = $room_data['picture'];
    ?>

</body>

<script>
    $(document).ready(function() {
        // Lakukan AJAX request setiap 5000ms (5 detik)
        setInterval(function() {
            $.ajax({
                url: '/room/check_owner',
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    if (response.data) {
                        // Jika respons adalah true, redirect ke route home
                        console.log('ada data dengan student_id null.');
                    } else {
                        // Jika respons adalah false, tidak berbuat apa-apa
                        window.location.href = '{{ route('booking_confirmation') }}';

                    }
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan AJAX
                    console.error('Terjadi kesalahan AJAX:', error);
                }
            });
        }, 1000); // Interval 5000ms (5 detik)
    });
</script>

</html>
