// import { browserHistory } from 'react-router';
import {get_token} from '../utils/http_functions'
import {
    LOGIN_USER_SUCCESS,
    LOGIN_USER_FAILURE,
    LOGIN_USER_REQUEST,
    LOGOUT_USER,
    REGISTER_USER_FAILURE,
    REGISTER_USER_REQUEST,
    REGISTER_USER_SUCCESS,
} from '../constants/index';

export function loginUserRequest() {
    return {
        type: LOGIN_USER_REQUEST,
    };
}
export function loginUserSuccess(token) {
    return {
        type: LOGIN_USER_SUCCESS,
        payload: {
            token,
        },
    };
}
export function loginUserFailure(error) {
    return {
        type: LOGIN_USER_FAILURE,
        payload: {
            status: error.status,
            statusText: error.statusText,
        },
    };
}
export function loginUser(username, password) {
    return (dispatch)=> {
        dispatch(loginUserRequest());
        return get_token(username, password)

    };
}
