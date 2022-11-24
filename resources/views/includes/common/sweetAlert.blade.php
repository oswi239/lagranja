<script>
    Livewire.on('mensaje', mensaje => {


        msg = mensaje[0]
        tipo = mensaje[1]
        const Toast = Swal.mixin({
            toast: true
            , position: 'bottom-end'
            , showConfirmButton: false
            , timer: 3000
            , timerProgressBar: true
            , didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: tipo
            , title: msg
        })
    })

</script>
