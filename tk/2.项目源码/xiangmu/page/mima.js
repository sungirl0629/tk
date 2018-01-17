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
   ScrollView,
  TouchableOpacity,
  Alert,
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import shouye from './shouye';
import NetUtil from './NetUtil';
export default class zhuce extends Component {
	constructor(props){
	super(props);
	this.lodpass='';
    this.newpass='';
    this.repass=''
    	this.state={
    		userid:'',
    		username:'',
    	};
	  }
	  tj=()=>{
    if(this.newpass!=this.repass){
        Alert.alert('温馨提示','两次输入密码不一致');
        return;
    }
    let _this=this;
    let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/uplodpass";
    let params='userid='+this.state.userid+'&lodpass='+this.lodpass+'&newpass='+this.newpass;
    NetUtil.postForm(url,params,function(result){
        if(result['info']=='succ'){
             Alert.alert('温馨提示','修改成功',[{text:'确定',onPress:()=>_this.props.navigator.pop()}]);
            storage.save({  //保存值
               key:'userdata',
               data:{
                   userpass:result['password'],
                   nickname:result['username'],
					userid:result['id'],
                   userphoto:result['photo'],
               },
                expires: null,
            });
        }else if(result['info']=='fail'){
            Alert.alert('Sorry~','服务器繁忙 请稍后重试');
        }else if(result['info']=='bucunzai'){
                 Alert.alert('温馨提示','原密码错误');
        }else{
            Alert.alert('温馨提示','修改成功',[{text:'确定',onPress:()=>_this.props.navigator.pop()}]);
        }
    })
} 
	fanhui=()=>{
   	this.props.navigator.pop();
  }
  componentWillMount(){
  	storage.load({
    key: 'loginStatus',
    autoSync: true,
    syncInBackground: true,
    syncParams: {
	extraFetchOptions: {
	},
	someFlag: true,
    },
}).then(ret => {
		this.setState({
				userid:ret.userid,
				username:ret.username
			});		
		  }).catch(err => {
		  })
  }
  render() {
	 return (
	<View style={styles.zuida}>
		<View style={styles.hang}>
			<TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
        		<Image style={{width:30,height:23,marginLeft:10,marginTop:12}} source={require('../images/fanhui.png')}/>
      		</TouchableOpacity>
			<Text style={styles.zhuceer}> 密码修改</Text>
		</View>
		<View style={styles.kuang}>
			<View style={styles.bian}>
		 		<View style={styles.users}>
					<Image style={styles.img} source={require('../image/121313123123.gif')}/>
					<Text style={styles.shu}>|</Text>
	    			<TextInput onChangeText={(text)=>{this.lodpass=text}} style={{width:411,}} secureTextEntry={true} placeholder="请输入原密码" underlineColorAndroid='transparent'/>
	    		</View>
	 			<View style={styles.users}>
	 				<Image style={styles.img} source={require('../image/121313123123.gif')}/>
					<Text style={styles.shu}>|</Text>
	 				<TextInput onChangeText={(text)=>{this.newpass=text}} style={{width:411,}} placeholder="请输入新密码" underlineColorAndroid='transparent' secureTextEntry={true}/>
	   			</View>
	    		<View style={styles.userser}>
					<Image style={styles.img} source={require('../image/121313123123.gif')}/>
					<Text style={styles.shu}>|</Text>
	    			<TextInput onChangeText={(text)=>{this.repass=text}} style={{width:300,}} secureTextEntry={true} placeholder="请确认新密码" underlineColorAndroid='transparent'/>
	    		</View>
		 		<View style={styles.dl}>
       				<TouchableHighlight>
						<Text style={styles.login} onPress={this.tj}>确认修改</Text>
					</TouchableHighlight>
	   			</View>
	  		</View>
	   	</View>  
	</View>	
    );
  }
}
const styles = StyleSheet.create({
users: {
width:411,
 borderBottomWidth:0.5,
 borderColor:'#2F4F4F',
 flexDirection:'row',
 backgroundColor:'#fff',
  },
  userser: {
width:411,
 flexDirection:'row',
 backgroundColor:'#fff',
  },
  zuida:{
		width:'100%',
		height:'100%',
		backgroundColor:'#f2f2f2',
		
	},
   shu: {
	   marginTop:13,
   },
   img: {
    width: 40,
    height: 40,
  },
  bian: {
  	 width:'100%',
  	 height:1,
	  marginTop:10,
  },
  
 zhuceer:{
	 color:'#fff',
	  paddingLeft:95,
	  paddingTop:10,
	  fontSize:18,
  },
  dl: {
	backgroundColor: '#fff',
	alignItems:'center',
	marginTop:28,
	width:'100%',  
	height:50,
 },
  dler: {
	alignItems:'center',
	borderRadius: 5,
	marginTop:10,
	width:60,  
	height:30,
	borderColor:'#1e90ff',
	borderWidth:1,
	backgroundColor:'#1e90ff',
 },
 login:{
	  color:'#1dacfa',
	  fontWeight:'500',
	  paddingTop:10,
	  fontSize:18,

  },

  kuang :{
	  width:'100%',
	  height:400,
	 
  },
  kkk :{
	  width:400,
	  flexDirection:'row',
	  
  },
  kkker: {
	  marginTop:16,
	  marginLeft:240,
	 
  },
  wz: {
		  textAlign:'center',
			color:'#808080',
		  marginTop:220,
		  fontSize:16,
	 },
	 fanhui: {
		 color:'#f0fff0',
		 fontSize:20,
	 },
	 hang:{
		  width:'100%',
		  height:50,
		 backgroundColor:'#1dacfa',
		  flexDirection:'row',
	 },
	
});


