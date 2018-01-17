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
  TouchableOpacity,
  Image
} from 'react-native';
import NetUtil from './NetUtil';
import mubiaoshedingdati from './mubiaoshedingdati';
import {Navigator} from 'react-native-deprecated-custom-components'
export default class bencichengji extends Component {
    fanhui=()=>{
   this.props.navigator.push({
    name:'mubiaoshedingdati',
    component:mubiaoshedingdati
   });
  }
  constructor(props){
    super(props);
    this.state=({
        sjtkid:this.props.sjtkid,
        info:''
      });
  };
  componentWillMount(){
     let _this=this;
            let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/getstore";
            let parms="sjtkid="+this.state.sjtkid;
            NetUtil.postForm(url,parms,function(result){ 
                _this.setState({
                   info:result
                });
                _this.forceUpdate();
              
            });
  }
  render() {
    return (
    <Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>
      <View>
        <View style={styles.tou}>
          <TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
            <Image style={{width:32,height:25,marginLeft:10}} source={require('../images/fanhui.png')}/>
          </TouchableOpacity>
          <Text style={styles.tous}>本 次 成 绩</Text>
        </View>
        <View style={styles.kuang}>
          <View style={styles.kuang1}>
            <Text style={styles.zi}>本次共做:    {this.state.info.tishu}  题</Text>
          </View>
          <View style={styles.kuang1}>  
            <Text style={styles.zi}>正     确:    {this.state.info.zhengque}  题</Text>
          </View>  
          <View style={styles.kuang1}>
            <Text style={styles.zi1}>错     误:    {this.state.info.cuowu}  题</Text>
          </View>
          <View style={styles.kuang1}>
            <Text style={styles.zi}>总成绩为:    {this.state.info.totalsocre}  分</Text>
          </View>  
        </View>
      </View>
    </Image>
    );
  }
}

const styles = StyleSheet.create({
  zi: {
    fontSize:18,
    color:'#036aa2',
    fontWeight:'500',
    textAlign: 'center',
    margin: 10,
  },
  zi1: {
    fontSize:18,
    color:'#f00',
    fontWeight:'500',
    textAlign: 'center',
    margin: 10,
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
    paddingTop:13,
    backgroundColor:'#1dacfa',
  },
  kuang:{
    width:'100%',
  },
  kuang1:{
    marginLeft:'10%',
    marginTop:'8%',
    width:'80%',
    height:'15%',
    alignItems:'center',
    justifyContent:'center',
    borderWidth:1,
    borderColor:'#acaeaf',
    backgroundColor:'#eef5ff',
    opacity:0.5,
    borderRadius:5
  }
});

 