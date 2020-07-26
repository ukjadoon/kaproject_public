require('./bootstrap');
import Swal from 'sweetalert2';
import 'canvas-gauges';

window.livewire.on('success', message => {
    Swal.fire({
        title: 'Success!',
        text: message,
        icon: 'success',
        toast: true,
        timerProgressBar: true,
        position: 'bottom-end',
        timer: 4000
    });
});

window.livewire.on('back', route => {
    window.location.replace(route);
});
