<script>

    function turnOnLampA(){
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
                            window.location.href = '{{route('lamp-a-index')}}';
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
        objXMLHttpRequest.open('GET', '/output/lamp/turn-on');
        objXMLHttpRequest.send();
    }

    function turnOffLampA(){
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
                            window.location.href = '{{route('lamp-a-index')}}';
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
        objXMLHttpRequest.open('GET', '/output/lamp/turn-off');
        objXMLHttpRequest.send();
    }

</script>