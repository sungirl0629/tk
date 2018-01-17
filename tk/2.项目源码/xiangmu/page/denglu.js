/**
 * Sample React Native App
 * https://github.com/facebook/react-native 登陆
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
import zhuce from './zhuce';
import shouye from './shouye';
import Mainpage from './Mainpage';
import NetUtil from './NetUtil';
import wangjimima from './wangjimima'
export default class denglu extends Component {
   constructor(props){
        super(props);
        this.telphone='';
        this.password='';
   };
   zhuce=()=>{
   this.props.navigator.push({
     name:'zhuce',
    component:zhuce
   });
  }
  zhaohui=()=>{
   this.props.navigator.push({
     name:'wangjimima',
    component:wangjimima
   });
  }
/*dologin=()=>{
  succs=(res)=>{
    if(res.msg=='succ'){
        storage.save({
      key: 'loginState', 
      data:{
          userid:res.info.Id,
          photo:res.info.photo,
          money:res.info.money,
          sex:res.info.sex,
          birth:res.info.birth,
          intime:res.info.intime,
          membername:res.info.membername,
      },
          expires: 1000 * 3600 * 24,
      })
        const {navigator}=this.props;
        if(navigator){
        navigator.push({
          name:'Index',
          component:Index,
          params:{
            userid:this.Id ,
          }
        });
      }
    }
    if(res.msg=='fail'){
        //Alert.alert('提示','密码错误');
        ToastAndroid.show('密码错误',ToastAndroid.SHORT);
    }else if(res.msg=='error'){
        ToastAndroid.show('用户名不存在',ToastAndroid.SHORT);     
    }
  }
    let url='http://www.alroy.cn/prisonapi/index/login';
    let params = {'username':this.username,'password':this.password};
    let rest=NetUtil.postJSON(url,params,function(result){
     this.succs(result); 
    });
    }*/

dologin=()=>{
  succs=(res)=>{
    if(res.msg=='succ'){
      storage.save({
    key: 'loginStatus',  // 注意:请不要在key中使用_下划线符号!
    data: { 
      username: res.info.username,
      userid: res.info.id
     },
    // 如果不指定过期时间，则会使用defaultExpires参数
    // 如果设为null，则永不过期
    expires: null
  });
      this.props.navigator.push({
        name:'shouye',
        component:shouye
      });
    }
    if(res.msg=='fail'){
            Alert.alert('温馨提示','密码错误');
    }else if(res.msg=='none'){
           Alert.alert('温馨提示','手机号不存在');
        }
  }
  let url='http://www.hilyy.cn/index.php/tiku/Xiangmu/denglu';
  let params = {'telphone':this.telphone,'password':this.password};
  let rest=NetUtil.postJSON(url,params,function (result) {
      this.succs(result);
     });
};

  render() {
	 return (
  <View style={styles.container}>
	  <Image source={require('../images/beijing.png')} style={{width:'100%',height:'100%'}}>
  	  <Text style={styles.head}>
        <Image style={styles.imgs} source={require('../images/login.png')}/>
  	  </Text>
  	  <View style={styles.bj}>
        <View style={styles.users}>
          <Image style={{width: 20,height: 20,margin:9}} source={require('../image/shouji.png')}/>
           <Text style={styles.shu}>|</Text>
  			  <TextInput onChangeText={(text)=>{this.telphone=text}} placeholder="请输入手机号" style={{width:300,}} underlineColorAndroid='transparent'/>
  		  </View>
  		  <View style={styles.psd}>
          <Image style={styles.img} source={require('../image/suo1.png')}/>
  			  <Text style={styles.shu}>|</Text>
  			  <TextInput onChangeText={(text)=>{this.password=text}} placeholder="请输入密码" secureTextEntry={true} style={{width:300,}} underlineColorAndroid='transparent'/>
  		  </View>
  		  <View style={{marginTop:20}}>
          <TouchableHighlight>
  		      <Text style={styles.login} onPress={this.dologin} >开始登陆</Text>
  	      </TouchableHighlight>
  		  </View>
  		  <View style={styles.dls}>
  		    <Text style={styles.dlss} onPress={this.zhaohui}>忘记密码</Text>
  		    <Text style={styles.dlsss} onPress={this.zhuce}>注册账号</Text>
  		  </View>
  		</View>
	  </Image>
  </View>
    );
  }
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },
  img: {
    width: 40,
    height: 40,
  },
   imgs: {
	 width: 200,
    height: 200,
  },
  head: {
    textAlign: 'center',
   marginTop:60,
  },
  users: {
 width:330,
 borderBottomWidth:1,
 flexDirection:'row',
},
  psd: {
	  marginTop:10,
	 flexDirection:'row',
	  width:330,
	 borderBottomWidth:1,
 },
  dls: {
	  marginTop:20,
	 flexDirection:'row',
	 alignItems:'center',
  },
  dlss: {
	 color:'#1e90ff',
	 fontSize:15,
   marginLeft:20,
  },
   dlsss: {
	  marginLeft:180,
	 color:'#1e90ff',
	 fontSize:15,
   marginTop:5,
  },
  bj: {
	marginTop:50,
	height:200,
	width:400, 
	marginLeft:'4%',
  },
  login:{
    width:'84%',  
    height:45,
	  color:'#fff',
	  padding:10,
	  textAlign:'center',
	  paddingRight:20,
	  borderRadius:10,
	  fontWeight:'700',
	  fontSize:16,
    backgroundColor: '#1e90ff',
    marginTop:10,
  },
   shu: {
	   marginTop:13,
   },
});


