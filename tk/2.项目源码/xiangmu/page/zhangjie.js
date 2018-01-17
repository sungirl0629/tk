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
import zhangjiexuexi from './zhangjiexuexi';
import shunxuxuexi from './shunxuxuexi';
import timu from './timu';
import mubiaoshedingxuexi from './mubiaoshedingxuexi';
import cuotixuexi from './cuotixuexi';
export default class zhangjie extends Component {
  constructor(props){
    super(props);
    this.state=({
      userid:this.props.userid,
    });
  }
  shouye=()=>{
   this.props.navigator.push({
     name:'shouye',
    component:shouye
   });
  }
  zhangjiexuexi=()=>{
   this.props.navigator.push({
     name:'zhangjiexuexi',
    component:zhangjiexuexi
   });
  }
  shunxuxuexi=()=>{
   this.props.navigator.push({
     name:'shunxuxuexi',
    component:shunxuxuexi,
    params:{
      tid:1,
      flag:'',
    }
   });
  }
    timu=()=>{
   this.props.navigator.push({
     name:'timu',
    component:timu,
    params:{
      tid:1,
      flag:'',
      kk:1,
      sjid:0
    }
   });
  }
  mubiaosheding=()=>{
   this.props.navigator.push({
     name:'mubiaoshedingxuexi',
    component:mubiaoshedingxuexi,
   });
  }
  cuotixuexi=()=>{
   this.props.navigator.push({
     name:'cuotixuexi',
    component:cuotixuexi,
    params:{
      kk:1,
      flag:'',
      userid:this.state.userid
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
      <Text style={styles.tousan}>章节学习</Text>
    </View>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.zhangjiexuexi}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/kemu.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi} onPress={this.zhangjiexuexi}>选择科目学习</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you} onPress={this.zhangjiexuexi}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang2} onPress={this.shunxuxuexi}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/shunxu.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.shunxuxuexi}>顺序学习</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.shunxuxuexi}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.timu}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/suiji.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.timu}>随机题目学习</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.timu}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang2} onPress={this.mubiaosheding}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/mubiao.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.mubiaosheding}>目标设定学习</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.mubiaosheding}>
        <Image style={styles.jia} source={require('../image/jiantou.png')}/>
      </TouchableOpacity>
    </TouchableOpacity>
    <TouchableOpacity activeOpacity={0.1} style={styles.kuang1} onPress={this.cuotixuexi}>
      <View style={styles.zuo}>
        <Image style={styles.tu} source={require('../image/cuoti.png')}/>
      </View>
      <View style={styles.zhong}>
        <Text style={styles.zi}  onPress={this.cuotixuexi}>错题库学习</Text>
      </View>
      <TouchableOpacity activeOpacity={0.1} style={styles.you}  onPress={this.cuotixuexi}>
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
    fontSize:17,
    color:'#000',
    color:'#000'
  },
  jia:{
  marginTop:'20%',
  marginLeft:'20%',
  width:'50%',
  height:'50%',
 }
});

