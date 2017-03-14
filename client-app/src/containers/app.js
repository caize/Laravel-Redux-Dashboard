import React from 'react';
import Sider from '../components/layout/sider'
import Header from '../components/layout/header'

class App extends React.Component{

  constructor(props){
    super(props);
    this.state = {
      siderOpen:false
    };
  }

  handleChange() {
    this.setState({siderOpen:!this.state.siderOpen})
  }

  render(){
    return (
      <div>
        <Header handleChange={this.handleChange.bind(this)}/>
        <Sider handleChange={this.handleChange.bind(this)} open={this.state.siderOpen} />
        <div
          className="container"
          style={{ marginTop: 10, paddingBottom: 250 }}
          >
          {this.props.children}
        </div>
      </div>
    )
  }
}

// App.propTypes={
//   children:React.propTypes.symbol.isRequired
// }


export default App;
