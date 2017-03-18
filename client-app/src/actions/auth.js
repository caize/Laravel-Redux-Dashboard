import { hashHistory } from 'react-router';
import { parseJSON } from '../utils/misc';
import { get_token, register_user } from '../utils/http_functions'
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
    return(dispatch) => {
        dispatch(loginUserRequest());
        return get_token(username, password).then(parseJSON).then(response => {
            try {
                dispatch(loginUserSuccess(response.token));
                hashHistory.push('/');
            } catch(e) {}
        })
    };
}
export function registerUserRequest() {
    return {
        type: REGISTER_USER_REQUEST,
    };
}
export function registerUserSuccess(token) {
    return {
        type: REGISTER_USER_SUCCESS,
        payload: {
            token,
        },
    };
}
export function registerUserFailure(error) {
    return {
        type: REGISTER_USER_FAILURE,
        payload: {
            status: error.status,
            statusText: error.statusText,
        },
    };
}
export function registerUser(username, email, password) {
    return(dispatch) => {
        dispatch(registerUserRequest());
        return register_user(username, email, password).then(parseJSON).then(response => {
            try {
                dispatch(registerUserSuccess(response.token));
                hashHistory.push('/');
            } catch(e) {}
        })
    };
}
