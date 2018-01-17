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
  TouchableOpacity
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import shouye from './shouye';
import zhangjiedati from './zhangjiedati';
import shunxu from './shunxu';
import suiji from './suiji';
import mubiaoshedingdati from './mubiaoshedingdati';
import cuotidati from './cuotidati';
export default class shitidati extends Component {
  shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye
   });
  }
  zhangjiedati=()=>{
   this.props.navigator.push({
     name:'zhangjiedati',
    component:zhangjiedati
   });
  }
  shunxu=()=>{
   this.props.navigator.push({
     name:'shunxu',
    component:shunxu,
    params:{
      tid:1,
      flag:'',
    }
   });
  }
    suiji=()=>{
   this.props.navigator.push({
     name:'suiji',
    component:suiji,
    params:{
      tid:1,
      flag:'',
      kk:1,
      sjid:0,
    }
   });
  }
  mubiaosheding=()=>{
   this.props.navigator.push({
     name:'mubiaoshedingdati',
    component:mubiaoshedingdati,
   });
  }
  cuotidati=()=>{
   this.props.navigator.push({
     name:'cuotidati',
    component:cuotidati,
    params:{
      tid:1,
      flag:'',
    }
   });
  }
  render() {
    return (
<Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>
  <View style={styles.zuida}>
    <View style={styles.tou}>
      <TouchableOpacity activeOpacity={1} onPress={this.shouye}>
        <Image style={{width:30,height:23,marginLeft:10,marginTop:12}} source={require('../images/fanhui.png')}/>
      </TouchableOpacity>
      <Text style={styles.tousan}>试题答题</Text>
    </View>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.zhangjiedati}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/kemu.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi} onPress={this.zhangjiedati}>选择科目答题</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you} onPress={this.zhangjiedati}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang2} onPress={this.shunxu}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/shunxu.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.shunxu}>顺序答题</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.shunxu}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.suiji}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/suiji.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.suiji}>随机答题</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.suiji}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang2} onPress={this.mubiaosheding}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/mubiao.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.mubiaosheding}>目标设定答题</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.mubiaosheding}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.cuotidati}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/cuoti.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.cuotidati}>错题库答题</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.cuotidati}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
  </View>
</Image>
    );
  }
}

const styles = StyleSheet.create({
  zuida:{
    width:'100%',
    height:'100%', 
  },
  tou: {
    height:50,
    width:'100%',
    backgroundColor:'#1dacfa',
    flexDirection:'row',  
  },
  tousan: {
    marginTop:10,
    fontSize:18,
    color:'#fff',
    marginLeft:100,
  },
  kuang1:{
    width:'100%',
    height:'10%',
    marginTop:'5%',
    backgroundColor:'#b5e4f1',
    borderTopWidth:1,
    borderBottomWidth:1,
    borderColor:'#afb7c4',
    flexDirection:'row',  
  },
  kuang2:{
    width:'100%',
    height:'10%',
    marginTop:'5%',
    backgroundColor:'#ebe1e7',
    borderTopWidth:1,
    borderBottomWidth:1,
    borderColor:'#afb7c4',
    flexDirection:'row',  
  },
  zuo:{
  width:'20%',
  height:'100%',
 },
 zhong:{
  width:'65%',
  height:'100%',
 },
 you:{
  width:'15%',
  height:'100%',

 },
 tu:{
  width:'80%',
  height:'90%',
  marginLeft:'5%',
  marginTop:'5%'
 },
  zi:{
    marginLeft:'5%',
    marginTop:'7%',
    fontSize:18,
    color:'#000',
  },
  jia:{
  marginTop:'20%',
  marginLeft:'20%',
  width:'50%',
  height:'50%',
 }
});

