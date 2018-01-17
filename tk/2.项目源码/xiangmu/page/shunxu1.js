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
  Alert,
  Image,TouchableHighlight,TouchableOpacity
} from 'react-native';
import NetUtil from './NetUtil';
import shunxu from './shunxu';
import shitidati from './shitidati';
import {Navigator} from 'react-native-deprecated-custom-components';
import CheckboxList from 'react-native-checkboxlist';//引用单和多项组件
export default class shunxu1 extends Component {
  fanhui=()=>{
   this.props.navigator.push({
    name:'shitidati',
    component:shitidati,
    params:{
      userid:this.state.userid,
    }
   });
  }
  tiaohuiqu=()=>{
    this.props.navigator.pop();
  }
  constructor(props){
    super(props);
    this.state=({
    status:true,
    tid:this.props.tid,
    flag:this.props.flag,
    timuinfo:'',
    disabled:false,
    answer:'',
    answerintro:'',
    rigths:'',
    customanswer:[],
    userid:'',
    msg:'',
      isdati:false,
    });
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
     });
    
    this.forceUpdate();
  }).catch(err => {   
  })
            let _this=this;

            let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/timuinfo";
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
                  tid:result.id ,
                  timuinfo:result,
                 // answer:result.answer,
                  status:false,
                   disabled:false,
                });
                _this.forceUpdate();
              }
            });
  }
  nexttimu=()=>{
      if(this.state.isdati)
    {
    this.props.navigator.push({
      name:'shunxu',
      component:shunxu,
      params:{
      tid:this.state.tid,
      flag:'next',
      }
    });
  }
  else{
     Alert.alert('请选择答案');
  }
  }

  onselects=(option)=>{  
    
       // alert(this.state.userid);
       let answer=option.value;
       //alert(answer);
        let _this=this;
            let url="http://www.hilyy.cn/index.php/tiku/Xiangmu/timudaan";
            let parms="tid="+this.state.tid+"&userid="+this.state.userid+"&cuanswer="+answer;
            NetUtil.postForm(url,parms,function(result){
              //alert(result.answer)
              let rrs;
                if(answer==result.answer)
                {
                    rrs='正确';
                }
                else
                {
                  rrs='错误';
                }
               //alert(rrs);
                _this.setState({
                  isdati:true,   
                  answer:"答案："+result.answer,
                  customanswer:option.value,
                  answerintro:"答案解析："+result.answerintro,
                  disabled:true,
                  rights:rrs,
                });
                _this.forceUpdate();
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
  <View>
    <View style={styles.tou}>
      <TouchableOpacity activeOpacity={1} onPress={this.fanhui}>
        <Image style={{width:32,height:25,marginLeft:10}} source={require('../images/fanhui.png')}/>
      </TouchableOpacity>
      <Text style={styles.tous}>顺序答题</Text>
    </View>
    <View style={styles.timu}>
      <View style={styles.timuer}>
       <Text style={styles.leixing}>{this.state.timuinfo.type}题</Text>
       <Text style={styles.daan}>{this.state.timuinfo.title}</Text>
      </View>
      <View style={{marginTop:15,marginLeft:15}}>
        <CheckboxList
          maxSelectedOptions={this.state.timuinfo.numbers}
          optionStyle={{width:'100%'}}
          options={this.state.timuinfo.options}
          selectedOptions={this.state.customanswer}
          onSelection={this.onselects}
          disabled={this.state.disabled}
        />
      </View>
    </View>
    <View>
      <Text style={styles.daanjiexi}>
        {this.state.rights}
      </Text>
        <Text style={styles.daanjiexi}>
        {this.state.answer}
      </Text>
      <Text style={styles.daanjiexi}>
        {this.state.answerintro}
      </Text>
    </View>
    <View style={{flexDirection:'row',paddingTop:20}}>
      <TouchableOpacity activeOpacity={0.1} onPress={this.tiaohuiqu}>
        <Image style={{width:90,height:31,marginLeft:10}} source={require('../images/shang.png')}/>
      </TouchableOpacity>
      <TouchableOpacity activeOpacity={0.1} onPress={this.nexttimu} style={{marginLeft:'45%'}}>
        <Image style={{width:90,height:31}} source={require('../images/xia.png')}/>
      </TouchableOpacity>
    </View>
  </View>
    );
  }
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
    marginLeft:'25%',
    color:'#fff',
    alignItems:'center',
    justifyContent:'center',
    paddingTop:10,
    backgroundColor:'#1dacfa',
  },
});

