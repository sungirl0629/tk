/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import Mainpage from './page/Mainpage';
const NoBackSwipe = {
  ...Navigator.SceneConfigs.HorizontalSwipeJump,
  gestures: {
    pop: {}
  }
};

export default class xiangmu extends Component {
  render() {
     let defaultName = 'Mainpage';
     let defaultComponent = Mainpage;
            return (
      <Navigator
              initialRoute={{
        name: defaultName,
        component: defaultComponent ,
        configure: NoBackSwipe}}
              configureScene={(route) => {
                return NoBackSwipe;
              }}
              renderScene={(route, navigator) => {
                let Component = route.component;
                return <Component {...route.params} navigator={navigator} />
              }} />
            );

  }
}
const styles = StyleSheet.create({
  
});

AppRegistry.registerComponent('xiangmu', () => xiangmu);
