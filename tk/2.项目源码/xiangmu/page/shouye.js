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
  View,
  Image, 
  BackHandler,  
  Platform,  
  ToastAndroid,
  TouchableOpacity,
  ViewPagerAndroid,
  ScrollView,
  ListView,
  Dimensions,
  WebView,
	Button,
  DrawerLayoutAndroid,
}from 'react-native';
var lastBackTime = "";//记录点击返回键的时间  
import Navigator from 'react-native-deprecated-custom-components';
import tuichu from './tuichu';
import chengji from './chengji';
import zhangjie from './zhangjie';
import shitidati from './shitidati';
import cuotijilu from './cuotijilu';
import zhuce from './zhuce';
import denglu from './denglu';
import Index from './Index';
import SideMenu from 'react-native-side-menu';
import Carousel from 'react-native-carousel';//引用轮播

const{width,height} = Dimensions.get('window')
export default class shouye extends Component {
	componentWillMount() {
    BackHandler.addEventListener('hardwareBackPress', () => {
      if (this.props.navigator) {
        let routes = this.props.navigator.getCurrentRoutes();
        let lastRoute = routes[routes.length - 1]; // 当前页面对应的route对象  
        if (lastRoute.onHardwareBackPress) { // 先执行route注册的事件  
          let flag = lastRoute.onHardwareBackPress();
          if (flag === false) { // 返回值为false就终止后续操作  
            return true;
          }
        }
        if (routes.length === 2) { // 在第一页了,2秒之内点击两次返回键，退出应用 

          if (this.lastBackPressed && (this.lastBackPressed + 2000) >= Date.now()) {
            return false;
          }
          // 此处可以根据情况实现 点2次就退出应用，或者弹出rn视图等  
          //记录点击返回键的时间  
          //lastBackTime = Date.now();
          this.lastBackPressed = Date.now();
          ToastAndroid.show('再按一次退出应用', ToastAndroid.SHORT);
          return true;
        } else {
          this.props.navigator.pop();
        }
      }
      return true;
    });
  }
  componentWillUnmount() {
    if (Platform.OS === 'android') {
      BackHandler.removeEventListener('hardwareBackPress', () => {});
    }
  }
  
   constructor(props) {
     super(props);
     this.state = {
      isOpen : false,
      selectedItem:'About',
      userid:this.props.userid
     };
   }
    shitidati=()=>{
   this.props.navigator.push({
     name:'shitidati',
    component:shitidati
   });
  }
    chengji=()=>{
   this.props.navigator.push({
     name:'chengji',
    component:chengji,
    params:{
      userid:this.state.userid
    }
   });
  }

      zhangjie=()=>{
   this.props.navigator.push({
     name:'zhangjie',
    component:zhangjie,
    params:{
      userid:this.state.userid
    }
   });
  }
  cuotijilu=()=>{
   this.props.navigator.push({
     name:'cuotijilu',
    component:cuotijilu,
    params:{
      tid:1,
      flag:'',
      userid:this.state.userid
    }
   });
  }
shezhi=()=>{
   this.props.navigator.push({
     name:'tuichu',
    component:tuichu
   });
  }
  render() {
    return (
<View style={{width:'100%',height:'100%',backgroundColor:'#f4f4f4'}}>
  
    <View style={styles.head}>
      <Text style={{marginTop:12,fontSize:17,marginLeft:'5%',color:'#fff'}}>
        <Image style={{width:85,height:85}} source={require('../image/wode.png')}/>
      </Text>
      <Text style={styles.title}>随身题库</Text>
      <Text onPress={this.shezhi} style={{marginTop:'4%',fontSize:17,marginLeft:'25%',color:'#fff'}}>
        <Image style={{width:70,height:70}} source={require('../images/shezhi.png')}/>
      </Text>
    </View>
    <View style={styles.zuida}>
      <View style={{height:'30%'}}>
        <Carousel delay={3000}>
          <Image source={require('../images/1.jpg')} style={{width:'100%',height:'100%'}} />
          <Image source={require('../images/6.png')} style={{width:'100%',height:'100%'}} />
        </Carousel>
      </View>
      <View style={styles.shang}>
        <TouchableOpacity activeOpacity={1} onPress={this.zhangjie} style={styles.kuang}>
          <Image source={require('../images/zhangjie.png')} style={styles.tu}/>
          <Text style={styles.zi}>章节学习</Text>
        </TouchableOpacity>
        <TouchableOpacity activeOpacity={1} onPress={this.shitidati} style={styles.kuang}>
          <Image source={require('../images/tu.png')} style={styles.tu}/>
          <Text style={styles.zi}>试题答题</Text>
        </TouchableOpacity>
      </View>
      <View style={styles.xia}>
        <TouchableOpacity activeOpacity={1} onPress={this.chengji} style={styles.kuang}>
          <Image source={require('../images/chengji.png')} style={styles.tu}/>
          <Text style={styles.zi}>成绩查询</Text>
        </TouchableOpacity>
        <TouchableOpacity activeOpacity={1} onPress={this.cuotijilu} style={styles.kuang}>
          <Image source={require('../images/cuoti.png')} style={styles.tu}/>
          <Text style={styles.zi}>错题收录</Text>
        </TouchableOpacity>
      </View>
    </View>
  
</View>
    );
  }
}
const styles = StyleSheet.create({
  title:{
   paddingTop:9,
   color:'#fff',
   fontSize:23,
   marginLeft:'25%'
 },
 head:{
  backgroundColor:'#1dacfa',
  height:50,
  flexDirection:'row'
 },
 zuida:{
  width:'100%',
  height:'100%',
 },
 shang:{
  width:'100%',
  height:'30%',
  marginTop:'5%',
  flexDirection:'row',
 },
  xia:{
  width:'100%',
  height:'30%',
  flexDirection:'row',
 },
 kuang:{
  width:'44%',
  height:'87%',
  borderRadius:5,
  backgroundColor:'#fff',
  borderWidth:1,
  borderColor:'#d0d0d0',
  marginLeft:'4%',
 },
 tu:{
  width:'52%',
  height:'50%',
  marginTop:'9%',
  marginLeft:'24%'
 },
 zi:{
  fontWeight:'500',
  fontSize:18,
  textAlign:'center',
  marginTop:'9%'
 }
});


