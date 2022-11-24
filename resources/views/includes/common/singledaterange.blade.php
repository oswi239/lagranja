    <script>
        Livewire.on('modal', accion => {

            if (accion == 'show') {
                var modal = document.getElementById('openModal');
                var datepicker = document.getElementById('fechainicio')
                var focus = document.getElementById('focus')



                setTimeout(function() {
                    if (focus) {
                        focus.focus()
                    }
                    if (datepicker) {
                        $(datepicker).daterangepicker({

                            "locale": {
                                "format": "DD/MM/YYYY"
                                , "separator": " - "
                                , "applyLabel": "Apply"
                                , "cancelLabel": "Cancelar"
                                , "fromLabel": "Desde"
                                , "toLabel": "Hasta"
                                , "customRangeLabel": "Custom"
                                , "weekLabel": "W"
                                , "daysOfWeek": [
                                    "DO"
                                    , "Lu"
                                    , "Ma"
                                    , "Mi"
                                    , "Ju"
                                    , "Vi"
                                    , "Sa"
                                ]
                                , "monthNames": [
                                    "Enero"
                                    , "Febrero"
                                    , "Marzo"
                                    , "Abril"
                                    , "Mayo"
                                    , "Junio"
                                    , "Julio"
                                    , "Agosto"
                                    , "Setiembre"
                                    , "Octubre"
                                    , "Noviembre"
                                    , "Diciembre"
                                ]
                                , "firstDay": 1
                            },

                            singleDatePicker: true

                                ,

                            "autoApply": true,

                            startDate: moment()
                        }, function(start) {
                            @this.fi = start;
                        })

                    }
                }, 500);
            } else {

                modal = document.getElementById('closeModal');
            }
            modal.click()
        })
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        //

    </script>
