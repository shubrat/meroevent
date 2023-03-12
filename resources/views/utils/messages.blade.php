<script>
 const initSwitchToggler = () => {
        if (document.querySelectorAll('.js-switch').length) {
            let switcheryEl = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            switcheryEl.forEach(function(html) {
                new Switchery(html, {
                    size: 'small'
                });
            });
        }
    }


</script>

<!-- Alertify -->
@php
    $errors = Session::get('error');
    $messages = Session::get('success');
    $info = Session::get('info');
    $warnings = Session::get('warning')
@endphp

@if (is_array($errors)) @foreach($errors as $key => $value)
    <script>
        alertify.error("{{ $value }}")
    </script>
@endforeach @endif

@if ($messages) @foreach($messages as $key => $value)
    <script>
        alertify.success("{{ $value }}")
    </script>
@endforeach @endif

@if ($info) @foreach($info as $key => $value)
    <script>
        alertify.info("{{ $value }}")
    </script>
@endforeach @endif

@if ($warnings) @foreach($warnings as $key => $value)
    <script>
        alertify.warning("{{ $value }}")
    </script>
@endforeach @endif
