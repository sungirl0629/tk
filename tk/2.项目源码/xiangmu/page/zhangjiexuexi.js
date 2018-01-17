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
  Alert,
  TextInput,
  TouchableHighlight,
  ScrollView,
  ListView,
  TouchableOpacity,
  Image
} from 'react-native';
import {Navigator} from 'react-native-deprecated-custom-components';
import ModalDropdown from 'react-native-modal-dropdown';
import NetUtil from './NetUtil';
import zjtm from './zjtm';
import zhangjie from './zhangjie';
export default class zhangjiexuexi extends Component {
  tiaohuiqu=()=>{
    this.props.navigator.push({
     name:'zhangjie',
    component:zhangjie
   });
  }
 timu=(wid)=>{
 const {navigator}=this.props;
  if (navigator){
    navigator.push({
      name:'zjtm',
      component:zjtm,
      params:{
      tid:1,
      flag:'',
      wid:wid,
      kk:1,
    }
    });
  }
}
  constructor(props){
    super(props);
     this.state = {
      id:'no',
    currdata:[],
    dataSource: new ListView.DataSource({
     rowHasChanged: (row1, row2) => row1 !== row2,
      }),
  };
  }
componentWillMount(){ 
  renderdata=(result)=>{
     this.setState({
       currdata:result.info,
        dataSource:this.state.dataSource.cloneWithRows(result.options),
    });
  }
  let _this=this;
  let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/zhangjie";
  let parms="subname";
  NetUtil.postForm(url,parms,function(result){
    this.renderdata(result);    
  });
} 
  render() {
    return (
<Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>
<View>
  <View style={styles.tou} >
    <TouchableOpacity activeOpacity={1} onPress={this.tiaohuiqu}>
      <Image style={{width:30,height:23,marginLeft:10}} source={require('../images/fanhui.png')}/>
    </TouchableOpacity>
    <Text style={styles.tous}>科目列表学习</Text>
  </View>
  <ListView
      dataSource={this.state.dataSource}
      renderRow={(rowData) =>
      <View>
        <TouchableOpacity activeOpacity={1} onPress={this.timu.bind(this,rowData.id)}>
          <View style={styles.kuang}>
            <Text style={styles.coace}>{rowData.subname}</Text>
            <Text style={styles.coaces}>内容简介：{rowData.intro}</Text> 
          </View>
        </TouchableOpacity>
      </View>
      }
  />  
</View>
</Image>
    );
  } 
}
const styles = StyleSheet.create({
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
    color:'#fff',
    alignItems:'center',
    justifyContent:'center',
    paddingTop:10,
    paddingLeft:90,
    backgroundColor:'#1dacfa',
  },
  kuang:{
     borderBottomWidth:1,
   borderBottomColor:'#999',
   marginTop: 10,
   flexDirection: 'row',
   width:500,
   //borderWidth:1
  },
  coace:{
   height:30,
  color:'#000',
   marginTop:5,
   paddingLeft:25,
  },
  coaces:{
   height:30,
   marginLeft:50,
   marginTop:5,
   paddingLeft:25,
   color:'#000',
  },
  
});