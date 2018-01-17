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
  Image,TouchableHighlight,TouchableOpacity
} from 'react-native';
import NetUtil from './NetUtil';
import cuotijilu from './cuotijilu';
import {Navigator} from 'react-native-deprecated-custom-components';
import CheckboxList from 'react-native-checkboxlist';//引用单和多项组件
export default class cuoti extends Component {
  fanhui=()=>{
   this.props.navigator.push({
    name:'cuotijilu',
    component:cuotijilu
   });
  }
  tiaohuiqu=()=>{
    this.props.navigator.pop();
  }

  constructor(props){
    super(props);
    this.state=({
      xuanxiang:'中华人民共和国',
      tid:this.props.tid,
      flag:this.props.flag,
      status:true,
      id:this.props.nid,
      news:'',
    });
  }
  
  componentWillMount(){
    
  let _this=this;
  let url='http://www.hilyy.cn/index.php/tiku/Xiangmu/cuoti'
  let parms={nid:this.state.id};
  NetUtil.postJSON(url,parms,function(result){
    _this.setState({
      news:result,
      disabled:true,
    });
    _this.forceUpdate();
  });
}
  render() {
    return (
  <View>
    <View style={styles.tou}>
      <TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
        <Image style={{width:32,height:25,marginLeft:10}} source={require('../images/fanhui.png')}/>
      </TouchableOpacity>
      <Text style={styles.tous}>错题查看</Text>
    </View>
    <View style={styles.timu}>
      <View style={styles.timuer}>
        <Text style={styles.leixing}>{this.state.news.type}题</Text>
        <Text style={styles.daan}>
        {this.state.news.title}
        </Text>
      </View>
      <View style={{marginTop:15,marginLeft:15}}>
      </View>
    </View>
    <View style={{width:'90%',marginLeft:'5%',}}>
        <View style={{width:'93%',marginLeft:'7%',borderColor:'#f00'}}>
        <CheckboxList
          optionStyle={{width:'100%',}}
          options={this.state.news.options}
          selectedOptions={this.state.news.answer}
          onSelection={this.onselects}
         disabled={this.state.disabled}
        />
      </View>  
        <Text style={styles.daanjiexi}>
        答案：{this.state.news.answer}
      </Text>
        <Text style={styles.daanjiexi}>
        答案解析：{this.state.news.intro}
      </Text>  
      <Text style={styles.daanjiexi}>
        {this.state.news.answerintro}
      </Text>
    </View>
  </View>
    );
  }
}

const styles = StyleSheet.create({
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
    marginLeft:'28%',
    color:'#fff',
    alignItems:'center',
    justifyContent:'center',
    paddingTop:10,
    backgroundColor:'#1dacfa',
  },
});

