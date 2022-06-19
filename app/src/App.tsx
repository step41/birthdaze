import { Component } from 'react';
import Footer from './components/Footer';
import Home from './pages/Home';
import './styles/global.css';

type Props = {  
  company?: string,
};
type State = {};

class App extends Component<Props, State> {

  constructor(props: Props) {
    super(props);
    this.state = {};
    this.getToken()
      .then(res => this.setState({ data: res.msg }))
      .catch(err => console.log(err))

  }

  year = new Date().getFullYear(); 
  
/*   componentDidMount() {
    this.api()
      .then(res => this.setState({ data: res.msg }))
      .catch(err => console.log(err))
  }
 */

  async getToken() {
    const res = await fetch('/oauth/token', {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        grant_type: 'client_credentials',
        client_id: '62aef00d372757e82f093472',
        client_secret: 'ji8gyuVfcBJFO02H5F4oNk6zjNMHVisMSjgzYR8G',
        scope: 'basic',
      })
    });
    const body = await res.json();
    if (res.status !== 200) {
      throw Error(body.message);
    }
    return body;
  }

  render() {
    return (
      <div className="app">
        <Home title="Welcome home again!" />
        <Footer year={ this.year } company={ this.props.company || 'Step41 Development' }></Footer>
      </div>
    )
  }
}

export default App;
