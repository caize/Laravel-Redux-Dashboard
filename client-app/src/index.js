import React from 'react';
import ReactDOM from 'react-dom';
import {Provider} from 'react-redux'
import darkBaseTheme from 'material-ui/styles';
import {Router, hashHistory} from 'react-router';
import injectTapEventPlugin from 'react-tap-event-plugin';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';

import routes from './routes';
injectTapEventPlugin();
import configureStore from './store/configureStore'
const store = configureStore();
// const history = syncHistoryWithStore(browserHistory, store);

ReactDOM.render(
    <Provider store={store}>
        <MuiThemeProvider muiTheme={darkBaseTheme}>
            <Router history={hashHistory}>
                {routes}
            </Router>
        </MuiThemeProvider>
    </Provider>,
    document.getElementById('root')
);
