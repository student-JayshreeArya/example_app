

@php
    $user = "Om Namah Shivay";
    $vege = ['onion', 'lemon', 'capsicum'];
@endphp

<script>
    var data = @json($vege);
    data.forEach(function(entry){
        console.log(entry);
    });
</script>