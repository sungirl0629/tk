/**
 * Sample React Native App
 * https://github.com/facebook/react-native 注册
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  TextInput,
  Button,
  TouchableHighlight,
  ToastAndroid,
   Image,
   TouchableOpacity
 
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import shouye from './shouye';
import denglu from './denglu';
import mima from './mima';
export default class zhuce extends Component {
	constructor(props){
		  super(props);
	  }
	   tc=()=>{
		storage.remove({
	key: 'loginStatus'
});

  this.props.navigator.push({
     name:'denglu',
    component:denglu
   });
	}
	    shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye
   });
  }
   mima=()=>{
   this.props.navigator.push({
     name:'mima',
    component:mima
   });
  }
    gengxin=()=>{
		ToastAndroid.show('题库已是最新版本',ToastAndroid.SHORT);
	}
  render() {
	 return (
<View style={styles.zuida}>
	<View style={styles.tou}>
		<TouchableOpacity activeOpacity={1} onPress={this.shouye}>
	    	<Image style={{width:30,height:23,marginLeft:10,marginTop:12}} source={require('../images/fanhui.png')}/>
	    </TouchableOpacity>
		<Text style={styles.tousan}>设置</Text>
	</View>
	<View style={styles.zhong}>
		<Image style={{width:25,height:25,marginTop:9,marginLeft:10,}} source={require('../image/66.gif')}>
			<Text></Text>
		</Image>
		<Text style={styles.zhonger} onPress={this.mima}>修改密码</Text>
	</View>
	<View style={styles.zhong}>
		<Image style={{width:25,height:25,marginTop:9,marginLeft:10,}} source={require('../image/33.gif')}>
			<Text></Text>
		</Image>
		<Text style={styles.zhonger} onPress={this.gengxin}>题库版本更新</Text>
	</View>
	<View style={styles.xia}>
		<Text style={styles.xiaer} onPress={this.tc}>退出登录</Text>
	</View>
</View>
    );
  }
}
const styles = StyleSheet.create({
	zuida:{
		width:'100%',
		height:'100%',
		backgroundColor:'#f2f2f2',
	},
tou: {
	height:50,
	width:'100%',
	backgroundColor:'#1dacfa',
	 flexDirection:'row',  
},
zhong: {
	height:50,
	width:'100%',
	backgroundColor:'#fff',
	flexDirection:'row',  
	borderBottomWidth:1,
	borderColor:'#ccc',
},
xia: {
	height:50,
	width:'100%',
	marginTop:30,
	backgroundColor:'#fff',
	alignItems:'center',
	justifyContent:'center',
},
touer: {
	marginTop:15,
	fontSize:16,
	color:'#fff',
	marginLeft:10,
},
tousan: {
	marginTop:'3%',
	fontSize:18,
	color:'#fff',
	marginLeft:'30%',
},
zhonger:{
	marginTop:10,
	fontSize:15,
	color:'#000',
	marginLeft:10,
},
xiaer:{
	fontWeight:'500',
	fontSize:17,
	color:'#1dacfa',
},
	
});


