<script>

    function turnOnPumpB(){
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    var response = JSON.parse(objXMLHttpRequest.responseText)
                    if(response.status == 'success'){
                        swal({
                            title: 'Sukses',
                            text: response.msg,
                            icon: "success",
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        }).then((ok) => {
                            window.location.href = '{{route('pump-b-index')}}';
                        });
                    }else{
                        swal({
                            title: 'Gagal',
                            text: response.msg,
                            icon: "error",
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        });
                    }
                } else {

                }
            }
        }
        objXMLHttpRequest.open('GET', '/output/pump/turn-on-b');
        objXMLHttpRequest.send();
    }

    function turnOffPumpB(){
        var objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    var response = JSON.parse(objXMLHttpRequest.responseText)
                    if(response.status == 'success'){
                        swal({
                            title: 'Sukses',
                            text: response.msg,
                            icon: "success",
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        }).then((ok) => {
                            window.location.href = '{{route('pump-b-index')}}';
                        });
                    }else{
                        swal({
                            title: 'Gagal',
                            text: response.msg,
                            icon: "error",
                            closeOnClickOutside: false,
                            closeOnEsc: false
                        });
                    }
                } else {

                }
            }
        }
        objXMLHttpRequest.open('GET', '/output/pump/turn-off-b');
        objXMLHttpRequest.send();
    }

</script>
