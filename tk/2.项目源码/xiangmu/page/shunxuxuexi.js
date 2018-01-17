/**
 * Sample React Native App
 * https://github.com/facebook/react-native  跳转的第二个页面
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  StyleSheet,
  Text,
  View,
  Image,
  TouchableHighlight,
  TouchableOpacity,
} from 'react-native';
import NetUtil from './NetUtil';
import shunxuxuexi1 from './shunxuxuexi1';
import zhangjie from './zhangjie';
import {Navigator} from 'react-native-deprecated-custom-components';
import CheckboxList from 'react-native-checkboxlist';//引用单和多项组件
export default class shunxuxuexi extends Component {
  fanhui=()=>{
   this.props.navigator.push({
    name:'zhangjie',
    component:zhangjie
   });
  }
  tiaohuiqu=()=>{
    this.props.navigator.pop();
  }
  constructor(props){
    super(props);
    this.state=({
      tid:this.props.tid,
      flag:this.props.flag,
      timuinfo:'',
      status:true,
      answer:[],
      msg:'',
    });
  }
  componentWillUnmount(){
   // this.sit && clearInterval(this.sit);
  }
  componentWillMount(){
            let _this=this;
            let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/gettimuinfo";
            let parms="tid="+this.state.tid+"&flag="+this.state.flag;
            NetUtil.postForm(url,parms,function(result){
                if(result.msg=='lasts'){
                  _this.setState({
                  msg:'lasts',
                });
                _this.forceUpdate();
              }
              else{
                _this.setState({
                  tid:result.id,
                  timuinfo:result,
                  answer:result.answer,
                  status:false,
                   disabled:true,
                });
                _this.forceUpdate();
              }
            });
  }
  nexttimu=()=>{
    this.props.navigator.push({
      name:'shunxuxuexi1',
      component:shunxuxuexi1,
      params:{
        tid:this.state.tid,
        flag:'next'
      }
    });
  }
  render() {
    if(this.state.msg=='lasts'){
      return(
        <View> 
         <Image style={{width:'100%',height:'100%'}} source={require('../image/14.jpg')}>  
         <View style={styles.container}>
         <Text style={{fontSize:25,color:'#4392d5'}}>已经是最后一题了！！</Text>
          <Text style={{fontSize:25,marginLeft:-5,marginTop:20,color:'#4392d5'}} onPress={this.tiaohuiqu}>点击跳回</Text>
          </View>
          </Image>
        </View>
        );
    }
    else{
    return (
  <View style={{width:'100%',height:'100%',backgroundColor:'#f0eff3'}}>
    <View style={styles.tou}>
      <TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
        <Image style={{width:32,height:25,marginLeft:10}} source={require('../images/fanhui.png')}/>
      </TouchableOpacity>
        <Text style={styles.tous}>顺序学习</Text>
    </View>
    <View style={styles.timu}>
      <View style={styles.timuer}>
        <Text style={styles.leixing}>{this.state.timuinfo.type}题</Text>
        <Text style={styles.daan}>{this.state.timuinfo.title}</Text>
      </View>
      <View style={{marginTop:10,marginLeft:15}}>
        <CheckboxList
          maxSelectedOptions={this.state.timuinfo.numbers}
          optionStyle={{width:'100%',}}
          options={this.state.timuinfo.options}
          selectedOptions={this.state.answer}
          onSelection={this.onselects}
          disabled={this.state.disabled}
        />
      </View>
    </View>
    <View>
      <Text style={styles.daanjiexi}>
        答案：{this.state.timuinfo.answer}
      </Text>
      <Text style={styles.daanjiexi}>
        答案解析：{this.state.timuinfo.intro}
      </Text>
    </View>
    <View style={{flexDirection:'row',paddingTop:20}}>
      <TouchableOpacity activeOpacity={0.1} onPress={this.tiaohuiqu}>
        <Image style={{width:80,height:28,marginLeft:10}} source={require('../images/shang.png')}/>
      </TouchableOpacity>
      <TouchableOpacity activeOpacity={0.1} onPress={this.nexttimu} style={{marginLeft:'45%'}}>
        <Image style={{width:80,height:28}} source={require('../images/xia.png')}/>
      </TouchableOpacity>
    </View>
  </View>
    );
  }
}
}

const styles = StyleSheet.create({
   container: {
    justifyContent: 'center',
    alignItems: 'center',
    marginTop:200
  },
    timu: {
    width:'100%',
    marginLeft:'3%',
  },
  timuer: {
    width:'100%',
    flexDirection:'row',
  },
  timusan: {
    width:'100%',
    flexDirection:'row',
    marginLeft:10
  },
  daan: {
    width:'80%',
    marginTop:15,
    marginLeft:'2%',
    fontSize: 16,
    color:'#000000',
  },
  daanjiexi: {
    marginTop:'2%',
    fontSize: 14,
    marginLeft:'3%',
    color:'#000000',
  },
    leixing: {
    width:'15%',
    borderWidth:1,
    borderRadius:5,
    borderColor:'red',
    textAlign:'center',
    height:23,
    marginTop:15,
    paddingTop:2,
    color:'red',
    backgroundColor:'#f5fffa',
  },
  tou:{
    width:'100%',
    height:50,
    flexDirection: 'row',
    alignItems:'center',
    backgroundColor:'#1dacfa',
  },
  tous:{
    width:'100%',
    height:50,
    fontSize:18,
    marginLeft:'26%',
    color:'#fff',
    alignItems:'center',
    justifyContent:'center',
    paddingTop:10,
    backgroundColor:'#1dacfa',
  },
});

