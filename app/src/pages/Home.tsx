import { Component } from 'react';

type HomeProps = {
  title: string
}

class Home extends Component<HomeProps> {
  render() {
    return (
      <div>{ this.props.title }</div>
    )
  }
}

export default Home;