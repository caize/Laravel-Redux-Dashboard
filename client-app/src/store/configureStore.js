import {createStore,applyMiddleware} from 'redux'
import thunkMiddleware from 'redux-thunk';
import rootReducer from '../reducers'

const debugware = [];
export default function configureStore(initialState) {
    const store = createStore(
        rootReducer,
        initialState,
        applyMiddleware(thunkMiddleware, ...debugware)
    );
    return store
};