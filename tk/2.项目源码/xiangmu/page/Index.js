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
import Storage from 'react-native-storage'; //���ػ��洢
import { AsyncStorage } from 'react-native'; //����
import { Navigator } from 'react-native-deprecated-custom-components'  //������
import shouye from './shouye';  //�����ҳ
import denglu from './denglu';	//��¼ҳ��
var storage = new Storage({
  size:1000,   					 // ���������Ĭ��ֵ1000������ѭ���洢 
  storageBackend: AsyncStorage,  // �洢����
  defaultExpires:null,      	   // ���ݹ���ʱ��
  enableCache: true,    		 // ��дʱ���ڴ��л������ݡ�Ĭ�����á�
  //sync: require('./sync')  // ���sync�ļ���Ҫ���Լ�д��
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
