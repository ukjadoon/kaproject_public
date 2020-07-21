require('./bootstrap');
import Swal from 'sweetalert2';

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
