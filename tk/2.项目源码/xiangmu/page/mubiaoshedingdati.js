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
  TextInput,
  Image,
  TouchableHighlight,
  TouchableOpacity
} from 'react-native';

import ModalDropdown from 'react-native-modal-dropdown';
import NetUtil from './NetUtil';
import mbdt from './mbdt';
import shitidati from './shitidati';
export default class mubiaoshedingdati extends Component {
    constructor(props){
        super(props);
        this.state=({
            subjectlist:[],
            kemus:'',
            tishu:'',
        });
   };
  fanhui=()=>{
   this.props.navigator.push({
     name:'shitidati',
    component:shitidati
   });
  }
  componentWillMount(){
      let _this=this;
      let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/kemu";
      let params={id:this.state.id};
      NetUtil.postForm(url,'params',function(result){
          _this.setState({
            subjectlist:result,
          });
      });
  }
selectsss=(index,value)=>{
   this.setState({
      kemus:value,
   });
}
selecttishu=(index,value)=>{
   this.setState({
      tishu:value,

   });
}
tijiao=()=>{
  //alert('params');
  const{navigator}=this.props;
  if(navigator){
//开始
   this.props.navigator.push({
     name:'mbdt',
     component:mbdt,
     params:{
     tid:1,
     kemu:this.state.kemus,
     tishu:this.state.tishu,
     kk:1
    }
   });
  //结束
}
  }
  render() {
    return (
      <Image style={{width:'100%',height:'100%'}} source={require('../images/bj.png')}>
    <View>
      <View style={styles.tou}>
        <TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
          <Image style={{width:30,height:23,marginLeft:10}} source={require('../images/fanhui.png')}/>
        </TouchableOpacity>
        <Text style={styles.tous}>目标设定答题</Text>
      </View>
      <View style={styles.top}>
        <Text style={styles.ttop}>科目:</Text>
        <View style={{alignSelf:'flex-end',}}>
          <ModalDropdown onSelect={this.selectsss.bind(this)} style={styles.kuang} textStyle={{fontSize:15}} dropdownStyle={{width:80, marginLeft:-13,}}  defaultValue='选择科目' options={this.state.subjectlist}/>
        </View>
      </View> 
      <View style={styles.top}>
        <Text style={styles.ttop}>题数:</Text>
        <View style={{alignSelf:'flex-end',}}>
          <ModalDropdown onSelect={this.selecttishu.bind(this)} style={styles.kuang} textStyle={{fontSize:15}} dropdownStyle={{width:80, marginLeft:-13}} defaultValue='选择题数' options={['5', '10','15','20','30']}/>    
        </View>
      </View>
      <View style={styles.top}>
        <View style={styles.tijiao}>
          <TouchableHighlight>
            <Text onPress={this.tijiao.bind(this)} style={{fontSize:20,color:'#fff'}}>提交</Text>
          </TouchableHighlight>
        </View>
      </View>
    </View>
    </Image>
  );
}
}
const styles = StyleSheet.create({
  leixing:{
    marginTop:20,
    fontSize:20,
  },
top:{
  marginTop:30,
  borderWidth:0,
  justifyContent:'center',
  flexDirection:'row',
},
ttop:{
    marginTop:3,
    fontSize:20,
    borderWidth:0,
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
    color:'#fff',
    alignItems:'center',
    justifyContent:'center',
    paddingTop:12,
    paddingLeft:90,
    backgroundColor:'#1dacfa',
  },
  
  tijiao:{
        borderWidth:0,
        width:100,
        height:30,
        alignItems:'center',
        backgroundColor:"#1dacfa",
        borderRadius:5,
        justifyContent:'center',
    },
    input:{
      fontSize:15,
      width:200,
      borderWidth:1,
      borderRadius:5,
      height:40,
    },
    kuang:{
borderWidth:1,
borderRadius:3,
borderColor:'#ccc',
width:80,
height:30,
marginTop:3,
alignItems:'center',
justifyContent:'center',
paddingLeft:5
    },
});

