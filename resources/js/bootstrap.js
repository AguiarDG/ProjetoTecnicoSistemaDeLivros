import "bootstrap";

/* Import do jQuery */
import jQuery from 'jquery';
window.$ = jQuery;

/* Import do plugin para o campo de multi select */
import select2 from 'select2';
select2();

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
