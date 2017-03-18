import React from 'react';
import { Route } from 'react-router';
import App from './containers/app'
import Login from './containers/login'
import Register from './containers/register'


export default (
    <Route path="/" component={App}>
      <Route path="login" component={Login}/>
      <Route path="register" component={Register}/>
    </Route>
);
