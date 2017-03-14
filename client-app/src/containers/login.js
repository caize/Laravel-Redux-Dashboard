import React from 'react';
import {loginUser} from '../actions/auth';
import {connect} from 'react-redux';
import Login from '../components/auth/login'

function mapStateToProps(state) {
    return {
        isAuthenticating: state.auth.isAuthenticating,
        statusText: state.auth.statusText,
    };
}

function mapDispatchToProps(dispatch) {
    return {
        loginUser: (username, password) => {
            dispatch(loginUser(username, password))
        }
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Login);