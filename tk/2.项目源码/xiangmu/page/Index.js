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
import Storage from 'react-native-storage'; //本地化存储
import { AsyncStorage } from 'react-native'; //引用
import { Navigator } from 'react-native-deprecated-custom-components'  //导航器
import shouye from './shouye';  //题库首页
import denglu from './denglu';	//登录页面
var storage = new Storage({
  size:1000,   					 // 最大容量，默认值1000条数据循环存储 
  storageBackend: AsyncStorage,  // 存储引擎
  defaultExpires:null,      	   // 数据过期时间
  enableCache: true,    		 // 读写时在内存中缓存数据。默认启用。
  //sync: require('./sync')  // 这个sync文件是要你自己写的
})  
global.storage = storage;

export default class xiangmu extends Component {
componentWillMount(){
	 storage.load({
    key: 'loginState',
    autoSync: true,
    syncInBackground: true,
    syncParams: {
	extraFetchOptions: {
	},
	someFlag: true,
    },
  }).then(ret => {
		this.props.navigator.push({
			name:'shouye',
			component:shouye,
		});
	
  }).catch(err => {
		this.props.navigator.push({
			name:'denglu',
			component:denglu,
		});

  })
}

  render() {
    return (
	<Text>
	</Text>
    );
  }
}

AppRegistry.registerComponent('xiangmu', () => xiangmu);
