import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import './fetchUsers';
import './modalControls';
import './userActions';
import { fetchUsers } from './fetchUsers';
import { deleteUser, hideModal, openEditModal, toggleUserActiveStatus } from './userActions';



window.fetchUsers = fetchUsers;
window.deleteUser = deleteUser;
window.toggleUserActiveStatus = toggleUserActiveStatus;
window.openEditModal = openEditModal;
window.hideModal = hideModal;



