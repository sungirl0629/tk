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
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import NetUtil from './NetUtil';
import denglu from './denglu';
import TimerButton from './countDownButton.js';
var yzm='';
export default class zhuce extends Component {

	constructor(props){
		  super(props);
		 this.telphone='';
        this.password='';
        this.vercode='';
	  }
	denglu=()=>{
   this.props.navigator.push({
     name:'denglu',
    component:denglu,
 
   });
  }
 
 _requestAPI(shouldStartCounting){
 	let url="http://www.hilyy.cn/index.php/tiku/Message/sendMessage";
 	let parms="telphone="+this.telphone;
 	NetUtil.postForm(url,parms,function(result){
 		if(result.code==200)
 		{
 			yzm=result.obj;

 		}

 	});
    this.setState({
      state: '正在请求验证码'
    })
    setTimeout(()=>{
      const requestSucc = Math.random() + 0.5 > 1
      this.setState({
        state:'succ'
      })
      shouldStartCounting && shouldStartCounting(requestSucc)
    }, 1000);

}
  render() {
	 return (
	<Image source={require('../images/beijing.png')} style={{width:420,height:708}}>
		<View>
			<Text style={styles.zhuceer}> 会员注册</Text>
		</View>
		<View style={styles.kuang}>
			<View style={styles.bian}>
				<View style={styles.users}>
					<Image style={styles.imgs} source={require('../image/shouji.png')}/>
					<Text style={styles.shu}>|</Text>
					<TextInput onChangeText={(text)=>{this.telphone=text}} style={{width:300,}} placeholder="请输入手机号" underlineColorAndroid='transparent'/>
				</View>
	 			<View style={styles.users}>
	 				<Image style={styles.img} source={require('../image/suo1.png')}/>
					<Text style={styles.shu}>|</Text>
	 				<TextInput onChangeText={(text)=>{this.password=text}} style={{width:300,}} placeholder="请输入密码" underlineColorAndroid='transparent' />
	   			</View>
	   			<View style={styles.users}>
	 				<Image style={styles.img} source={require('../image/suo1.png')}/>
					<Text style={styles.shu}>|</Text>
					<TextInput onChangeText={(text)=>{this.vercode=text}} style={{width:180,}} placeholder="请输入验证码" underlineColorAndroid='transparent' />
					<TimerButton enable={true} style={{width: 110,marginRight: 10}} 
					textStyle={{color: "#545454"}} timerCount={60} 
					onClick={(shouldStartCounting)=>{ 
						// 这里调用自己的获取验证码的API 
						// shouldStartCountting是一个回调函数，根据调用接口的情况在适当的时候调用它来决定是否开始倒计时 
						this._requestAPI(shouldStartCounting) }}/>
	 				 </View>	    		
		 		<View style={styles.dl}>
       				<TouchableHighlight>
						<Text onPress={this.doadd} style={styles.login}>开始注册</Text>
					</TouchableHighlight>
	   			</View>
	   			<View>
       				<TouchableHighlight>
						<Text style={styles.loginer} onPress={this.denglu}>已有账号 | 立即登陆</Text>
					</TouchableHighlight>
	  			</View>
	  		</View>
		</View>
	</Image>
    );
  }

  doadd=()=>{
  	if(this.vercode!=yzm){
  		alert('验证码错误');
  		return;
  	}
    fetch('http://www.yoyikeji.com/index.php/admin/Xiangmu/zhuce',
      {
      method:'POST',
      headers:{"Content-Type": "application/x-www-form-urlencoded"},
      body:'telphone='+this.telphone+"&password="+this.password,
    }).then(function (response){
      return response.json();
    }).then(function (jsonData){
      if(jsonData=='succ'){
        alert('注册成功');
      }
      if(jsonData=='fail'){
        alert('注册失败');
      }
    }).catch(function(){
      alert('出错了');
    });
  }

}
const styles = StyleSheet.create({
users: {
	width:330,
 	borderBottomWidth:1,
 	marginLeft:15,
 	marginTop:2,
 	borderColor:'#2F4F4F',
 	flexDirection:'row',
  },
   shu: {
	marginTop:13,
   },
   img: {
    width: 40,
    height: 40,
  },
imgs: {
    width: 20,
    height: 20,
    margin:9
  },
  bian: {
  	 width:'100%',
  	 height:'100%',
	 marginTop:20,
  },
  
 zhuceer:{
	 color:'#fff',
	  padding:10,
	  paddingLeft:'25%',
	  marginTop:50,
	  borderRadius:10,

	  fontSize:30,
  },
  dl: {
	 marginLeft:20,
	alignItems:'center',
	borderRadius: 5,
	marginTop:30,
	 width:330,  
	height:45,
 },
 login:{
 	textAlign:'center',
	 width:330,  
	height:45,
	backgroundColor: '#1e90ff',
	  color:'#fff',
	  padding:10,
	  paddingLeft:10,
	  paddingRight:20,
	  borderRadius:10,
	  fontWeight:'700',
	  fontSize:16,
  },
   loginer:{
	  color:'#1e90ff',
		textAlign:'center',
	  fontSize:15,
	  marginRight:30,
	    marginTop:30,
  },
  kuang :{
	  width:'100%',
	  height:400,
	
  },
 
  wz: {
		color:'#808080',
		textAlign:'center',
		marginTop:20,
		fontSize:15,
	 },
	 fanhui: {
		 color:'#f0fff0',
		 fontSize:20,
	 },
	
});


